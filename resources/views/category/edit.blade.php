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
        <h2 class="animate-charcter font-bold font-semibold text-xl text-gray-800 leading-tight text-center">
            Create New Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white border-b border-gray-200">
                    <div class="mt-6 text-gray-500">


                        <form action="{{route('category.update',$category->id)}}" class="mb-6" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="complaint_id" value="#">
                            <div class="bg-white rounded px-8 pt-6 pb-8 ">
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="status">
                                            Status
                                        </label>
                                        <select name="status" id="status" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                            <option value="Active"  @if($category->status == "Active") selected @endif>Active</option>
                                            <option value="InActive"  @if($category->status == "InActive") selected @endif>In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-3">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name" >
                                            Name
                                        </label>
                                        <input type="text" name="name" value="{{$category->name}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                                    </div>
                                </div>
                                <div class="-mx-3 md:flex mb-1">
                                    <div class="w-full px-3" row="8">
                                        <label class="block uppercase resize rounded-md tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-description">
                                            Category Description
                                        </label>
                                        <textarea name="description" rows="5"  class="appearance-none form-textarea w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-description">{{$category->description}}</textarea>
                                    </div>
                                </div>


                                <div class="md:w-1/2">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-file_attachments">
                                        file attachments (Scanned PDF, JPG)
                                        <br>
                                        (<a class="text-blue-500 underline" href="{{Storage::url($category->category_photo_url)}}" target="_blank">Existing File</a>)
                                    </label>
                                    <input name="category_photo_url_1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-file_attachments" type="file">
                                </div>

                                <div style="float: right" class="mt--1">
                                    <button class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        Update
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
