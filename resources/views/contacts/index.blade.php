@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading listheading"><b>@lang('contact.contacts')</b></div>
                    <button id="download-all" class="download-all btn btn-success"><i class="fa fa-download "></i>@lang('contact.export_contacts')</button>

                    <div class="panel-body">


                        <div id="contactslist">

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var allContacts = {!! json_encode($contacts) !!};
        var contactLang = {!! json_encode(trans('contact')) !!};

    </script>

@endsection
