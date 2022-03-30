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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    @endsection
    <x-slot name="header">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center inline-block ">
            Create New User
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('user.index')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg
            focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200
            dark:border-gray-200  dark:hover:bg-gray-700 2" title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="hidden md:inline-block ml-2">Back</span>
            </a>


{{--            <a href="javascript:;" id="toggle" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2" title="Members List">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>--}}
{{--                </svg>--}}
{{--                <span class="hidden md:inline-block ml-2">Search Filters</span>--}}
{{--            </a>--}}

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="mt-6 text-gray-500">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">{{$error}}</strong>
                                </div>
                                <br>
                            @endforeach
                        @endif


                        <form action="{{route('user.store')}}" class="mb-6" method="post">
                            @csrf
                            <div class="bg-white rounded px-8 pt-6 pb-8 ">

                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
                                            Account Status
                                        </label>
                                        <select name="status" id="status" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                            <option value="1">Activate</option>
                                            <option value="0">Deactivate</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name" >
                                            Name
                                        </label>
                                        <input type="text" name="name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                                    </div>
                                </div>

                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name" >
                                            Email
                                        </label>
                                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required">
                                    </div>
                                </div>

                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3">
                                    <label class="block font-medium text-sm text-gray-700" for="password">
                                        Password
                                    </label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="designation"  required="required">
                                            Designation
                                        </label>
                                        <input type="text" name="designation" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                                    </div>
                                </div>


                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="contact"  required="required">
                                            Contact
                                        </label>
                                        <input type="text" name="contact" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                                    </div>
                                </div>



                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="office">
                                            Office
                                        </label>
                                        <select name="office" id="office" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                            <option value="">Please select...</option>
                                            @foreach(\App\Models\User::office() as $ofc)
                                                <option value="{{$ofc}}">{{$ofc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div style="float: right" class="mt--1">
                                    <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('custom_footer')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
        <script src="https://emis.ajk.gov.pk/assets/js/jquery.mask.js" defer></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2();
                $('.cnic_mask').mask('00000-0000000-0');
                $('.number_mask').mask('0000-0000000');
                $('.phone_mask').mask('00000-000000');
            });
        </script>
    @endsection
</x-app-layout>
