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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
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

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">{{$error}}</strong>
                                </div>
                                <br>
                            @endforeach
                        @endif

                        <form action="{{route('complaint.update',$complaint->id)}}" class="mb-6" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="bg-white rounded px-8 pt-6 pb-8 ">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-complaint_date">
                                            complaint date
                                        </label>
                                        <input name="complaint_date" max="{{date('Y-m-d')}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-complaint_date" type="date"
                                               value="{{$complaint->complaint_date}}">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-subject">
                                            Subject
                                        </label>
                                        <input name="subject" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-subject" value="{{$complaint->subject}}" type="text">
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase resize rounded-md tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-description">
                                            description
                                        </label>
                                        <textarea name="description" rows="5" class="appearance-none form-textarea w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                                  id="grid-description">{{$complaint->description}}</textarea>
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-1">

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                                            category
                                        </label>
                                        <select name="category" id="category" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                            <option value="" selected="">Please Select</option>
                                            @foreach(\App\Models\Category::where('status', 'Active')->get() as $cat)
                                                <option value="{{$cat->name}}" @if( $complaint->category == $cat->name) selected @endif>{{$cat->name}}</option>
                                            @endforeach
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
                                                <option value="{{$district}}" @if($district == $complaint->district) selected @endif>
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
                                            <option value="Email" @if("Email" == $complaint->source) selected @endif>Email</option>
                                            <option value="Fax" @if("Fax" == $complaint->source) selected @endif>Fax</option>
                                            <option value="Phone Call" @if("Phone Call" == $complaint->source) selected @endif>Phone Call</option>
                                            <option value="In Person" @if("In Person" == $complaint->source) selected @endif>In Personl</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-3">

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-name">
                                            Name
                                        </label>
                                        <input name="name" value="{{$complaint->name}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-name" type="text">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-father_husband">
                                            Father/Husband Name
                                        </label>
                                        <input name="father_husband" value="{{$complaint->father_husband}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                               id="grid-father_husband" type="text">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                                            gender
                                        </label>
                                        <select name="gender" id="gender" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" required="">
                                            <option value="" selected="">Please Select</option>
                                            <option value="Male" @if("Male" == $complaint->gender) selected @endif>Male</option>
                                            <option value="Female" @if("Female" == $complaint->gender) selected @endif>Female</option>
                                            <option value="Transgender" @if("Transgender" == $complaint->gender) selected @endif>Transgender
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="-mx-3 md:flex mb-3">


                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-cnic">
                                            CNIC (format: xxxxx-xxxxxxx-x)
                                        </label>
                                        <input name="cnic" value="{{$complaint->cnic}}" placeholder="XXXXX-XXXXXXX-X" maxlength="15"
                                               class="cnic_mask appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-cnic" type="text">
                                    </div>

                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-cell_number">
                                            Mobile number
                                        </label>
                                        <input name="cell_number" value="{{$complaint->cell_number}}" placeholder="0300-1234567" minlength="12"
                                               class=" number_mask appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-cell_number" type="text">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-phone_number">
                                            Phone number
                                        </label>
                                        <input name="phone_number" value="{{$complaint->phone_number}}" placeholder="05822-920620" minlength="12"
                                               class="phone_mask appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-phone_number" type="text">
                                    </div>
                                </div>


                                <div class="-mx-3 md:flex mb-3">


                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                                            address
                                        </label>
                                        <textarea name="address" class="appearance-none form-textarea w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-cnic">{{$complaint->phone_number}}</textarea>
                                    </div>


                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="office">
                                            Related Office
                                        </label>
                                        <select name="office" id="office" class="appearance-none
                                        block w-full bg-grey-lighter text-grey-darker
                                        border border-red rounded py-3 px-4 mb-3">
                                            <option value="" selected="">Please Select</option>
                                            @foreach(\App\Models\User::office() as $office)
                                                <option value="{{$office}}" @if($complaint->office == $office) selected @endif>
                                                    {{$office}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                                            Complaint Mark To
                                        </label>
                                        <select name="user_id" id="user_id" class="select2 appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" required="">
                                            <option value="" selected="">Please Select</option>
                                            @foreach(\App\Models\User::all() as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="-mx-3 md:flex mb-3">


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
                                        <span>Update</span>
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
