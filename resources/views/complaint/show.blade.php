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
            <div class="w-full bg-white h-auto tracking-wide mb-14 border border-black-800 mx-1 rounded-lg relative">
                <div class="small-banner w-1 h-20 bg-blue-600 absolute rounded-tl-md"></div>
                <h5 class="text-sm float-right font-semibold pl-6 pt-6 pr-6 pb-2">
                    Complaint Details (AJKED-CN-{{$complaint->id}})  {{\Carbon\Carbon::parse($complaint->created_at)->format('d-M-Y h:m:s')}} - {{\Carbon\Carbon::parse($complaint->created_at)->diffForHumans()}}
                </h5>
                <h5 class="text-2xl font-semibold pl-6 pt-6 pr-6 pb-2">
                    Subject:  {{$complaint->subject}}
                </h5>
                <p class="text-md font-regular p-6 pt-2 text-black text-md">
                    {{$complaint->description}}
                </p>

                <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table class="min-w-max w-full table-auto border-collapse  ">
                                    <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6  text-left"></th>
                                        <th class="py-3 px-6  text-left"></th>
                                        <th class="py-3 px-6  text-center"></th>
                                        <th class="py-3 px-6  text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                            <td class="py-3 px-6 border border-slate-400 w-1/5 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Marked To</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 border border-slate-400  text-left">
                                                <div class="flex items-center">
                                                    @if(!empty($complaint->user_id))
                                                        {{\App\Models\User::find($complaint->user_id)->name}}
                                                    @endif

                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 font-bold w-1/5  px-6 text-left">
                                                Complainant
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6  text-left">
                                                {{$complaint->name}}
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Father/Husband</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                <div class="flex items-left">
                                                    {{$complaint->father_husband}}
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 font-bold px-6 text-left">
                                                Gender
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                {{$complaint->gender}}
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                            <td class="py-3 px-6 border border-slate-400 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">CNIC</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 border border-slate-400 text-left">
                                                <div class="flex items-center">
                                                    {{$complaint->cnic}}
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 font-bold px-6 text-left">
                                                Cell Number
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                {{$complaint->cell_number}}
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Phone Number</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                <div class="flex items-left">
                                                    {{$complaint->phone_number}}
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 font-bold text-left">
                                                District
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                {{$complaint->district}}
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                            <td class="py-3 px-6 border border-slate-400 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Address</span>
                                                </div>
                                            </td>
                                            <td colspan="3" class="py-3 px-6 border border-slate-400 text-left">
                                                <div class="flex items-center">
                                                    {{$complaint->address}}
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Category</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                <div class="flex items-left">
                                                    {{$complaint->category}}
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 font-bold px-6 text-left">
                                                Source
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left">
                                                {{$complaint->source}}
                                            </td>
{{--                                            <td class="py-3 border border-slate-400 px-6 font-bold text-left">--}}
{{--                                                Address--}}
{{--                                            </td>--}}
{{--                                            <td class="py-3 border border-slate-400 px-6 text-left">--}}
{{--                                                {{$complaint->name}}--}}
{{--                                            </td>--}}
                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">File(if any)</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left" colspan="3">
                                                <div class="flex items-left">
                                                    {{$complaint->name}}
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Actions</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left" colspan="3">
                                                <a href="{{route('remark.complaint.create',$complaint->id)}}" class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                    Take Action
                                                </a>
                                                <a href="{{route('complaint.edit',[$complaint->id])}}" class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                    Edit Complaint
                                                </a>
                                                <form action="{{route('complaint.destroy',[$complaint->id])}}"
                                                      onsubmit="return confirm('Do you really want to delete?');"
                                                      method="post" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                        Delete Complaint
                                                    </button>
                                                </form>

                                            </td>

                                        </tr>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 border border-slate-400 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-bold">Status</span>
                                                </div>
                                            </td>
                                            <td class="py-3 border border-slate-400 px-6 text-left" colspan="3">
                                                <div class="flex items-left">
                                                    <span class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                         {{$complaint->status}}
                                                    </span>

                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            @if($complaint->remarks->isNotEmpty())
                <div class="bg-white shadow-xl sm:rounded-lg p-10">
                    <h1 class="text-2xl font-bold text-center mb-10">Remarks History </h1>
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @foreach($complaint->remarks as $remarks)
                            <li class="mb-10 ml-6">
                            <span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">{{$remarks->user->name}}
                                    @if($loop->iteration == 1)
                                        <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">Latest</span>
                                    @endif
                                </h3>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                    {{\Carbon\Carbon::parse($remarks->created_at)->format('F dS, Y h:m:s A')}} - {{$remarks->status}}
                                </time>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{$remarks->description}}</p>

                                @if(!empty($remarks->file_attachments))
                                    <a href="{{Storage::url($remarks->file_attachments)}}" target="_blank" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg> View & Download Attachment</a>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
