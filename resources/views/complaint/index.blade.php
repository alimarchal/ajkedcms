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
    @endsection
    <x-slot name="header">
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center inline-block">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('complaint.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg
            focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200
            dark:border-gray-200  dark:hover:bg-gray-700 2" title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="hidden md:inline-block ml-2">Create New Complaint</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6">
                <a href="{{route('complaint.index',['filter[status]' => 'New'])}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{\App\Models\Complaint::where('status','New')->count()}}
                                </div>
                                <div class="mt-1 text-base font-bold text-gray-600">New Complaints</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://img.icons8.com/external-phatplus-lineal-phatplus/344/external-new-application-phatplus-lineal-phatplus.png"  class="h-12 w-12">
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
                                    {{\App\Models\Complaint::where('status','Closed')->count()}}
                                </div>
                                <div class="mt-1 text-base  font-bold text-gray-600">Closed Complaints</div>
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
                                    {{\App\Models\Complaint::count()}}
                                </div>
                                <div class="mt-1 text-base  font-bold text-gray-600">Total Complaint</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/344/external-documents-online-survey-flatart-icons-outline-flatarticons.png" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{route('complaint.create')}}" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="mt-2 text-base  font-bold text-gray-600 ">Create New Complaint</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-documents-history-flaticons-lineal-color-flat-icons.png" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
