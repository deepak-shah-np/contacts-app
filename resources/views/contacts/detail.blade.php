@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading listheading">
                        <b>@lang('contact.contact_detail')</b>
                        <button id="download-vcf" class=" download-all btn btn-success"><i class="fa fa-download "></i>@lang('contact.export_contact')</button>
                    </div>

                    <div class="panel-body">
                        <div class="detail">
                            <p><span>Name </span>{{$contact->name}} </p>
                            <p><span>Email</span> {{$contact->email}}</p>
                            <p><span>Phone</span> {{$contact->phone}}</p>
                            <p><span>Address</span> {{$contact->address}}</p>
                            <p><span>Company</span> {{$contact->company}}</p>
                            <p><span>Email</span> {{$contact->birth_date}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
    var contactDetail = {!! json_encode($contact) !!};
</script>
@endsection
