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
    @endsection
    <x-slot name="header">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System
        </h2>

        {{--        <div class="flex justify-center items-center float-right">--}}
        {{--            <a href="{{route('category.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg--}}
        {{--            focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200--}}
        {{--            dark:border-gray-200  dark:hover:bg-gray-700 2" title="Members List">--}}
        {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
        {{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />--}}
        {{--                </svg>--}}
        {{--                <span class="hidden md:inline-block ml-2">Create New Category</span>--}}
        {{--            </a>--}}
        {{--        </div>--}}
    </x-slot>

    <div class="py-22">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 mt-8">
                <h1 class="text-center text-2xl" style="font-family: 'Noto Nastaliq Urdu'; direction: rtl;">دفتر چیف انجینئر برقیات کو موصولہ درخواست/ شکایات / مکتوبات پر کی گئی کارروائی </h1>
                <br>


                <div class="relative overflow-x-auto shadow-md ">
                    <table class="w-full text-sm border-collapse border border-slate-400 text-left text-black dark:text-gray-400" style="direction: rtl;text-align: right;">
                        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 " >
                        <tr>
                            @foreach(\App\Models\Category::all() as $cat)
                                <th scope="col" class="px-1 py-3 border border-black" style="font-family: 'Noto Nastaliq Urdu';line-height: 2em; text-align: center">
                                    {{$cat->name}}
                                </th>

                            @endforeach
                                <th scope="col" class="px-1 py-3 border border-black" style="font-family: 'Noto Nastaliq Urdu';line-height: 2em; text-align: center">
                                    میزان
                                </th>

                                <th scope="col" class="px-1 py-3 border border-black" style="font-family: 'Noto Nastaliq Urdu';line-height: 2em; text-align: center">
                                   آمدہ پراگرس / جوابات
                                </th>
                            {{--                            <th scope="col" class="px-1 py-3">--}}
                            {{--                                Product name--}}
                            {{--                            </th>--}}
                            {{--                            <th scope="col" class="px-1 py-3">--}}
                            {{--                                Color--}}
                            {{--                            </th>--}}
                            {{--                            <th scope="col" class="px-1 py-3">--}}
                            {{--                                Category--}}
                            {{--                            </th>--}}
                            {{--                            <th scope="col" class="px-1 py-3">--}}
                            {{--                                Price--}}
                            {{--                            </th>--}}
                            {{--                            <th scope="col" class="px-1 py-3">--}}
                            {{--                                <span class="sr-only">Edit</span>--}}
                            {{--                            </th>--}}
                        </tr>
                        </thead>
                        <tbody>

@php
$first = 0;
$second = 0;
$third = 0;
$fourth = 0;
$fifth = 0;
@endphp
                            @foreach(\App\Models\User::office() as $office)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-black text-center">
                                <th scope="row" class="px-1 border border-black  py-2 font-medium text-black dark:text-white whitespace-nowrap">
                                    {{$office}}
                                </th>
                                    <th scope="row" class=" border border-black px-1 py-2 font-medium text-black dark:text-white whitespace-nowrap">

                                        @php $found = 0; @endphp
                                        @foreach($data as $d)
                                          @if($d->category == "وزیراعظم سیکرٹریٹ / وزیراعظم معائنہ کمیشن سے موصولہ درخواست / ہدایات" && $d->office == $office)
                                              {{$d->total}}
                                              @php $found = $found + 1; $first = $first + $d->total @endphp
                                          @endif
                                        @endforeach

                                        @if($found <= 0)
                                            0
                                        @endif

                                    </th>
                                    <td class="px-1 py-2 border border-black ">
                                        @php $found = 0; @endphp
                                        @foreach($data as $d)
                                            @if($d->category == "وزراء کرام سے موصولہ درخواست / ہدایات" && $d->office == $office)
                                                {{$d->total}}
                                                      @php $found = $found + 1; $second = $second + $d->total @endphp
                                            @endif
                                        @endforeach
                                         @if($found <= 0)
                                            0
                                        @endif
                                    </td>
                                    <td class="px-1 py-2 border border-black ">
                                        @php $found = 0; @endphp
                                        @foreach($data as $d)
                                            @if($d->category == "سیکرٹریٹ توانائی وآبی وسائل موصولہ مکتوب / درخواست / ہدایات" && $d->office == $office)
                                                {{$d->total}}
                                                      @php $found = $found + 1;  $third = $third + $d->total @endphp
                                            @endif
                                        @endforeach
                                         @if($found <= 0)
                                            0
                                        @endif
                                    </td>
                                    <td class="px-1 py-2 border border-black ">
                                        @php $found = 0; @endphp
                                        @foreach($data as $d)
                                            @if($d->category == "دفتر چیف انجینئر برقیات کو موصولہ شکایات / درخواست / ہدایات" && $d->office == $office)
                                                {{$d->total}}
                                                      @php $found = $found + 1; $fourth = $fourth + $d->total  @endphp
                                            @endif
                                        @endforeach
                                         @if($found <= 0)
                                            0
                                        @endif
                                    </td>
                                    <td class="px-1 py-2 border border-black">
                                        @php $found = 0; @endphp
                                        @foreach($data as $d)
                                            @if($d->category == "محتسب سیکرٹریٹ سے موصولہ شکایات / درخواست / ہدایات" && $d->office == $office)
                                                {{$d->total}}
                                                      @php $found = $found + 1;  $fifth = $fifth + $d->total @endphp
                                            @endif
                                        @endforeach
                                         @if($found <= 0)
                                            0
                                        @endif
                                    </td>

                                    <td class="px-1 py-2 border border-black">
                                        {{$data->where('office',$office)->sum('total') }}
                                    </td>


                                    <td class="px-1 py-2 border border-black">
                                       0
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <td class="px-1 py-2 border border-black">میزان</td>
                                <td class="px-1 py-2 border border-black">{{$first}}</td>
                                <td class="px-1 py-2 border border-black">{{$second}}</td>
                                <td class="px-1 py-2 border border-black">{{$third}}</td>
                                <td class="px-1 py-2 border border-black">{{$fourth}}</td>
                                <td class="px-1 py-2 border border-black">{{$fifth}}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
