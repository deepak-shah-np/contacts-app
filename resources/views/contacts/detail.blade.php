@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail</div>

                    <div class="panel-body">
                        <div class="detail">
                            <p>Name : {{$contact->name}} </p>
                            <p>Email: {{$contact->email}}</p>
                            <p>Phone: {{$contact->phone}}</p>
                            <p>Address: {{$contact->address}}</p>
                            <p>Company: {{$contact->company}}</p>
                            <p>Email: {{$contact->email}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
