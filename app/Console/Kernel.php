<?php

namespace App\Console;

use App\Models\ComplaintData;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {

            DB::beginTransaction();
            try {
                $complain_data = [];
                $status_wise_data = DB::table('complaints')->select('office_id', 'office', 'status', DB::raw("count(*) as total"))
                    ->groupBy('office', 'status')
                    ->get();
                foreach (Office::all() as $item) {
                    $complain_data[$item->id]['New'] = 0;
                    $complain_data[$item->id]['In Process'] = 0;
                    $complain_data[$item->id]['Closed'] = 0;
                }
                foreach ($status_wise_data as $item) {
                    $complain_data[$item->office_id][$item->status] = $item->total;
                }

                $complain_data_month = ComplaintData::whereDay('created_at', date('d'))->whereYear('created_at', date('Y'))->get();

                if ($complain_data_month->isNotEmpty()) {
                    $ids = $complain_data_month->pluck('id')->toArray();

                    foreach ($ids as $key) {
                        $item = ComplaintData::where('id', $key)->first();
                        $item->office_id = $item->office_id;
                        $item->new = $complain_data[$item->office_id]['New'];
                        $item->in_process = $complain_data[$item->office_id]['In Process'];
                        $item->closed = $complain_data[$item->office_id]['Closed'];
                        $item->save();
                    }

                } else {
                    foreach ($complain_data as $key => $value) {
                        $inserted_data = ComplaintData::create([
                            'office_id' => $key,
                            'new' => $value['New'],
                            'in_process' => $value['In Process'],
                            'closed' => $value['Closed'],
                        ]);
                    }
                }
                DB::commit();
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
            }

        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
