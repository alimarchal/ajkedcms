<x-app-layout>
    @section('custom_css')
        <style>
            .animate-charcter
            {
                background-image: linear-gradient(
                    -225deg,
                    #231557 0%,
                    #44107a 29%,
                    #ff1361 67%,
                    #fff800 100%
                );
                background-size: auto auto;
                background-clip: border-box;
                background-size: 200% auto;
                color: #fff;
                background-clip: text;
                text-fill-color: transparent;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                animation: textclip 2s linear infinite;
            }

            @keyframes textclip {
                to {
                    background-position: 200% center;
                }
            }
        </style>
    @endsection
    <x-slot name="header">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($complaint->isNotEmpty())
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Subject</th>
                            <th class="py-3 px-6 text-center">Complainant</th>
                            <th class="py-3 px-6 text-center">Mark To</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Complaint Date</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($complaint as $com)
                                @if($loop->iteration % 2 == 0)

                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <a href="{{route('complaint.show',$com->id)}}" class="hover:underline text-blue-500 font-bold">
                                                    AJKED-CN-{{$loop->iteration}}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                {{$com->subject}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{$com->name}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                                {{\App\Models\User::find($com->user_id)->name}}
                                            </span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">{{$com->status}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                {{\Carbon\Carbon::parse($com->complaint_date)->format('d-M-Y')}}
                                            </div>
                                        </td>
                                    </tr>
                                @else

                                    <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <a href="{{route('complaint.show',$com->id)}}" class="hover:underline text-blue-500 font-bold">
                                                    AJKED-CN-{{$com->id}}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                {{$com->subject}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                               {{$com->name}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">
                                               {{\App\Models\User::find($com->user_id)->name}}
                                            </span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">{{$com->status}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                {{\Carbon\Carbon::parse($com->complaint_date)->format('d-M-Y')}}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                        </tbody>

                    </table>


                @endif
            </div>
            <br>
            {{ $complaint->links() }}
        </div>
    </div>
</x-app-layout>
