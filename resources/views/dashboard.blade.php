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
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endsection
    <x-slot name="header">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @can('viewcards')
                <div class="grid grid-cols-12 gap-6">
                    <a href="{{route('complaint.index',['filter[status]' => 'New'])}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                        <div class="p-10">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="col-span-2">
                                    <div class="text-3xl font-bold leading-8">
                                        {{\App\Models\Complaint::where('status','New')->where('user_id', auth()->user()->id)->count()}}
                                    </div>
                                    <div class="mt-1 text-base font-bold text-gray-600">New Complaints</div>
                                </div>
                                <div class="col-span-1 flex items-center justify-end">
                                    <img src="https://img.icons8.com/external-phatplus-lineal-phatplus/344/external-new-application-phatplus-lineal-phatplus.png" class="h-12 w-12">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('complaint.index',['filter[status]' => 'In Process'])}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                        <div class="p-10">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="col-span-2">
                                    <div class="text-3xl font-bold leading-8">
                                        {{\App\Models\Complaint::where('status','In Process')->count()}}
                                    </div>

                                    <div class="mt-1 text-base  font-bold text-gray-600">In Process Complaints</div>
                                </div>
                                <div class="col-span-1 flex items-center justify-end">

                                    <img src="https://img.icons8.com/external-becris-flat-becris/344/external-process-franchise-business-becris-flat-becris.png" class="h-12 w-12 text-yellow-400" alt="">

                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('complaint.index',['filter[status]' => 'Closed'])}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                        <div class="p-10">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="col-span-2">
                                    <div class="text-3xl font-bold leading-8">
                                        {{\App\Models\Complaint::where('status','Closed')->where('user_id', auth()->user()->id)->count()}}
                                    </div>
                                    <div class="mt-1 text-base  font-bold text-gray-600">Resolved Complaints</div>
                                </div>
                                <div class="col-span-1 flex items-center justify-end">
                                    <img src="https://cdn-icons-png.flaticon.com/512/186/186359.png" alt="legal case" class="h-12 w-12">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('complaint.index')}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                        <div class="p-10">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="col-span-2">
                                    <div class="text-3xl font-bold leading-8">
                                        {{\App\Models\Complaint::where('user_id', auth()->user()->id)->count()}}
                                    </div>
                                    <div class="mt-1 text-base  font-bold text-gray-600">Total Complaint</div>
                                </div>
                                <div class="col-span-1 flex items-center justify-end">
                                    <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/344/external-documents-online-survey-flatart-icons-outline-flatarticons.png" alt="employees on leave" class="h-12 w-12">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('viewdashboard')
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                    {{--                <x-jet-welcome />--}}

                    <div class="flex flex-wrap overflow-hidden">
                        <div class="w-full overflow-hidden">
                            <div id="chart"></div>
                        </div>
                    </div>


                    <hr>
                    <br>


                    <div class="flex flex-wrap  overflow-hidden">

                        <div class="w-full  overflow-hidden lg:w-1/2 xl:w-1/2">
                            <div id="chart_1"></div>
                        </div>

                        <div class="w-full overflow-hidden lg:w-1/2 xl:w-1/2">
                            <div id="chart_2"></div>
                        </div>

                    </div>

{{--                    <hr>--}}
{{--                    <div class="flex flex-wrap overflow-hidden">--}}
{{--                        <div class="w-full overflow-hidden">--}}
{{--                            <div id="chart_3"></div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


                </div>
            @endcan
        </div>

    @can('viewdashboard')
        @section('custom_footer')
            <script>
                var options = {
                    series: [{
                        name: 'New',
                        data: [@foreach($list_of_office_status as $key => $value) {{$list_of_office_status[$key]['New']}}, @endforeach]
                    }, {
                        name: 'In Process',
                        data: [@foreach($list_of_office_status as $key => $value) {{$list_of_office_status[$key]['In Process']}}, @endforeach]
                    }, {
                        name: 'Closed',
                        data: [@foreach($list_of_office_status as $key => $value) {{$list_of_office_status[$key]['Closed']}}, @endforeach]
                    },],

                    chart: {
                        type: 'bar',
                        height: 450,
                        stacked: true,
                        toolbar: {
                            show: true
                        },
                        zoom: {
                            enabled: true
                        }
                    },
                    title: {
                        text: 'AJKED Office Wise Status',
                        floating: true,
                        margin: 30,
                        align: 'center',
                        style: {
                            color: '#444'
                        }
                    }
                    ,
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            borderRadius: 10
                        },
                    },
                    xaxis: {
                        type: 'text',
                        categories: [
                            @foreach(\App\Models\User::office() as $office)
                                '{{$office}}',
                            @endforeach
                        ],
                    },
                    legend: {
                        position: 'right',
                        offsetY: 40
                    },
                    fill: {
                        opacity: 1
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();


                var options_1 = {
                    series: [@foreach($status_wise as $key => $value) {{$value}}, @endforeach],
                    chart: {
                        type: 'pie',
                    },
                    labels: ['New', 'In Process', 'Closed'],
                    title: {
                        text: 'Status Wise Complaints',
                        floating: true,
                        margin: 30,
                        align: 'center',
                        style: {
                            color: '#444'
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart_1 = new ApexCharts(document.querySelector("#chart_1"), options_1);
                chart_1.render();


                var options_2 = {
                    series: [@foreach($category_wise_complaints as $cwc) '{{$cwc->total}}', @endforeach],
                    chart: {
                        type: 'donut',
                    },
                    title: {
                        text: 'Category Wise Complaints',
                        floating: true,
                        margin: 30,
                        align: 'left',
                        style: {
                            color: '#444'
                        }
                    },
                    labels: [@foreach($category_wise_complaints as $cwc) '{{$cwc->category}}', @endforeach],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart_2 = new ApexCharts(document.querySelector("#chart_2"), options_2);
                chart_2.render();


                var options_3 = {
                    series: [{
                        name: 'Complaints Received',
                        data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                    },
                    forecastDataPoints: {
                        count: 7
                    },
                    stroke: {
                        width: 5,
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
                        tickAmount: 10,
                        labels: {
                            formatter: function (value, timestamp, opts) {
                                return opts.dateFormatter(new Date(timestamp), 'dd MMM')
                            }
                        }
                    },
                    title: {
                        text: 'Category Wise Monthly Complaints',
                        align: 'middle',
                        style: {
                            fontSize: "16px",
                            color: '#666',
                        },
                        margin: 30,
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            gradientToColors: ['#FDD835'],
                            shadeIntensity: 1,
                            type: 'horizontal',
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100, 100, 100]
                        },
                    },
                    yaxis: {
                        min: -10,
                        max: 40
                    }
                };

                var chart_3 = new ApexCharts(document.querySelector("#chart_3"), options_3);
                chart_3.render();


            </script>
    @endsection
    @endcan
</x-app-layout>
