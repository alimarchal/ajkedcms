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
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center  inline-block ">
            Azad Jammu & Kashmir Electricity Department - Complaint Management System

        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{route('user.create')}}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg
            focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200
            dark:border-gray-200  dark:hover:bg-gray-700 2" title="Members List">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="hidden md:inline-block ml-2">Create New User</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($users->isNotEmpty())
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-center">Email</th>
                            <th class="py-3 px-6 text-center">Designation</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach($users as $user)
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <a href="{{route('user.edit',$user->id)}}" class="hover:underline text-blue-500 font-bold">
                                            {{$user->id}}
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        {{$user->name}}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{$user->email}}
                                </td>


                                <td class="py-3 px-6 text-center">
                                    {{$user->designation}}
                                </td>


                                <td class="py-3 px-6 text-center">
                                    @if($user->status == "0")
                                        De-Activated
                                    @else
                                        Activated
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">

                                    <a href="{{route('user.edit',$user->id)}}"
                                       class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
