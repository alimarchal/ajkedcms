<x-app-layout>
    @section('custom_css')
        <style>
            .animate-charcter {
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Nastaliq+Urdu">

        <link rel="stylesheet" href="{{url('daterange/daterangepicker.min.css')}}">
        <script src="{{url('daterange/jquery-3.6.0.min.js')}}"></script>
        <script src="{{url('daterange/moment.min.js')}}"></script>
        <script src="{{url('daterange/knockout-3.5.1.js')}}" defer></script>
        <script src="{{url('daterange/daterangepicker.min.js')}}" defer></script>

    @endsection
    <x-slot name="header" style="height: 80px;">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center inline-block">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System
        </h2>

        <form action="{{route('report.progressReport')}}" method="get" class="float-right">
            <input type="date"  name="month">
            &nbsp;
            <input type="submit" value="Search"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        </form>

        {{--                    <a href="{{route('category.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg--}}
        {{--                    focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200--}}
        {{--                    dark:border-gray-200  dark:hover:bg-gray-700 2" title="Members List">--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
        {{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />--}}
        {{--                        </svg>--}}
        {{--                        <span class="hidden md:inline-block ml-2">Create New Category</span>--}}
        {{--                    </a>--}}
    </x-slot>

    <div class="py-22">

        <div class="max-w-7xl mx-auto sm:px-1 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg p-5 mt-8">
                <h2 class="text-center font-bold">

                    Office of the Chief Engineer Electricity Muzaffarabad<br>
                    Progress Report Against Complaints / Application for the Period
                    @if(request()->has('date_range'))
                        {{\Carbon\Carbon::parse($start_of_month)->format('d-m-Y')}} to {{\Carbon\Carbon::parse($end_of_month)->format('d-m-Y')}}
                    @endif

                </h2>


                <div class="relative overflow-x-auto shadow-md ">
                    <table class="w-full text-sm border-collapse border border-slate-400 text-left text-black dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 ">
                        <tr class="text-center">

                            <th scope="col" class="px-1 py-3 border border-black" rowspan="2">
                                Name of office
                            </th>


                            <th scope="col" class="px-1 py-3 border border-black" rowspan="2">
                                Opening Balance<br>
                                {{$start_of_month->format('d-m-Y')}}
                            </th>

                            <th scope="col" class="px-1 py-3 border border-black" colspan="2">
                                During the Period <br>
                                {{$start_of_month->format('d-m-Y')}} to {{$end_of_month->format('d-m-Y')}}
                            </th>


                            <th scope="col" class="px-1 py-3 border border-black" rowspan="2">
                                Closing Balance
                            </th>


                        </tr>
                        <tr class="text-center">


                            <th scope="col" class="px-1 py-3 border border-black">
                                New Received
                            </th>

                            <th scope="col" class="px-1 py-3 border border-black">
                                Resolved
                            </th>

                        </tr>


                        </thead>
                        <tbody>

                        @php
                            $opening = 0;
                            $new = 0;
                            $resolved = 0;
                            $closing = 0;
                        @endphp
                        @foreach($final_data as $key => $value)

                            @foreach($value as $k => $v)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-black text-center">
                                    <th scope="row" class="px-1 border border-black  py-2 font-medium text-black dark:text-white whitespace-nowrap text-left">
                                        {{$k}}
                                    </th>
                                    <th scope="row" class=" border border-black px-1 py-2 font-medium text-black dark:text-white whitespace-nowrap">
                                        {{$v['Opening Balance']}}
                                    </th>
                                    <td class="px-1 py-2 border border-black ">
                                        {{$v['New']}}
                                    </td>
                                    <td class="px-1 py-2 border border-black ">
                                        {{$v['Closed']}}
                                    </td>
                                    <td class="px-1 py-2 border border-black ">
                                        @if((($v['Opening Balance'] + $v['New']) - $v['Closed']) <= 0)
                                            0
                                        @else
                                            {{($v['Opening Balance'] + $v['New']) - $v['Closed']}}
                                        @endif

                                    </td>

                                    @php
                                        $opening = $opening + $v['Opening Balance'];
                                        $new = $new + $v['New'];
                                        $resolved = $resolved + $v['Closed'];
                                        if((($v['Opening Balance'] + $v['New']) - $v['Closed']) <= 0){
                                             $closing = $closing + 0;
                                        } else
                                        {
                                             $closing = $closing + (($v['Opening Balance'] + $v['New']) - $v['Closed']);
                                        }
                                    @endphp

                                </tr>
                            @endforeach

                        @endforeach

                        <tr class="text-center font-bold">
                            <td class="px-1 py-2 border border-black">Total</td>
                            <td class="px-1 py-2 border border-black">{{$opening}}</td>
                            <td class="px-1 py-2 border border-black">{{$new}}</td>
                            <td class="px-1 py-2 border border-black">{{$resolved}}</td>
                            <td class="px-1 py-2 border border-black">{{$closing}}</td>

                        </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @section('custom_footer')
        <script>
            $(document).ready(function () {
                $("#date_range").daterangepicker({
                    minDate: moment().subtract(10, 'years'),
                    orientation: 'left',
                    callback: function (startDate, endDate, period) {
                        $(this).val(startDate.format('L') + ' – ' + endDate.format('L'));
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>
