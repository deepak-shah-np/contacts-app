@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contacts</div>
                    <button class="download-all">Export Contacts</button>

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

    </script>

@endsection
