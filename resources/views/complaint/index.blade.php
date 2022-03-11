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
            <div class="grid grid-cols-12 gap-6">
                <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">5</div>
                                <div class="mt-1 text-base font-bold text-gray-600">New Complaints</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">6</div>

                                <div class="mt-1 text-base  font-bold text-gray-600">In Process Complaints</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">0</div>
                                <div class="mt-1 text-base  font-bold text-gray-600">Closed Complaints</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://cdn-icons-png.flaticon.com/512/186/186359.png" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">0</div>
                                <div class="mt-1 text-base  font-bold text-gray-600">Total Complaint</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://cdn-icons-png.flaticon.com/512/914/914612.png" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-6 intro-y bg-white">
                    <div class="p-10">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">0</div>
                                <div class="mt-1 text-base  font-bold text-gray-600">Create Complaint</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://cdn-icons-png.flaticon.com/512/914/914612.png" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
