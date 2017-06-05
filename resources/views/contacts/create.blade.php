@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>@lang('contact.create_contacts')</b></div>

                    <div class="panel-body">

                        {!! Form::open(["route"=>'contact_store',"class"=>"form-horizontal"]) !!}


                             @include('contacts.partials.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
