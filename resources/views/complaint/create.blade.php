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
            Create New Complaint
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="mt-6 text-gray-500">


                        <form action="{{route('complaint.store')}}" class="mb-6" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-white rounded px-8 pt-6 pb-8 ">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-complaint_date">
                                            complaint date
                                        </label>
                                        <input name="complaint_date" max="{{date('Y-m-d')}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-complaint_date" type="date" value="{{old('complaint_date')}}">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-subject">
                                            Subject
                                        </label>
                                        <input name="subject" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-subject" value="{{old('subject')}}" type="text">
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase resize rounded-md tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-description">
                                            description
                                        </label>
                                        <textarea name="description" rows="5"  class="appearance-none form-textarea w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-description"></textarea>
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-1">

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                            category
                                        </label>
                                        <select name="category" id="category" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                            <option value="" selected="">Please Select</option>
                                            <option value="Male">Male
                                            </option>
                                            <option value="Female">
                                                Female
                                            </option>
                                            <option value="Transgender">Transgender
                                            </option>
                                        </select>
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="district">
                                            district
                                        </label>
                                        <select name="district" id="district" class="appearance-none
                                        block w-full bg-grey-lighter text-grey-darker
                                        border border-red rounded py-3 px-4 mb-3">
                                            <option value="" selected="">Please Select</option>
                                            @foreach(\App\Models\User::districts() as $district)
                                                <option value="{{$district}}">
                                                    {{$district}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="source">
                                            source
                                        </label>
                                        <select name="source" id="source" class="appearance-none
                                        block w-full bg-grey-lighter text-grey-darker
                                        border border-red rounded py-3 px-4 mb-3">
                                            <option value="" selected="">Please Select</option>
                                                <option value="Email">Email</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Phone Call">Phone Call</option>
                                                <option value="In Person">In Personl</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-3">

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-name">
                                            Name
                                        </label>
                                        <input name="name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-name" type="text">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-father_husband">
                                            Father/Husband Name
                                        </label>
                                        <input name="father_husband" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-father_husband" type="text">
                                    </div>
                                </div>

                                <div class="-mx-3 md:flex mb-3">

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                                            gender
                                        </label>
                                        <select name="gender" id="gender" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" required="">
                                            <option value="" selected="">Please Select</option>
                                            <option value="Male">Male
                                            </option>
                                            <option value="Female">
                                                Female
                                            </option>
                                            <option value="Transgender">Transgender
                                            </option>
                                        </select>
                                    </div>


                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-cnic">
                                            CNIC (format: xxxxx-xxxxxxx-x)
                                        </label>
                                        <input name="cnic" pattern="^\d{5}-\d{7}-\d{1}$" placeholder="XXXXX-XXXXXXX-X" maxlength="15" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-cnic" type="text">
                                    </div>

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-cell_number">
                                            Mobile number
                                        </label>
                                        <input name="cell_number" placeholder="0300-1234567" minlength="12" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-cell_number" type="text" >
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-phone_number">
                                            Phone number
                                        </label>
                                        <input name="phone_number" placeholder="0300-1234567" minlength="12" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-phone_number" type="text" >
                                    </div>
                                </div>




                                <div class="-mx-3 md:flex mb-3">


                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                                            address
                                        </label>
                                        <textarea name="address" class="appearance-none form-textarea w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-cnic"></textarea>
                                    </div>

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-file_attachments">
                                            file attachments (Scanned PDF, JPG)
                                        </label>
                                        <input name="file_attachments_1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-file_attachments" type="file">
                                    </div>
                                </div>



                                <div style="float: right" class="mt--1">
                                    <button class="bg-blue-500 hover:bg-blue-400
                                    text-white font-bold py-2 px-4 border-b-4
                                    border-blue-700 hover:border-blue-500 rounded">
                                        <span>Create Complaint and Process</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
