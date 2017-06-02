@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('contact.contacts')</div>
                    <button class="download-all">@lang('contact.export_contacts')</button>

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
