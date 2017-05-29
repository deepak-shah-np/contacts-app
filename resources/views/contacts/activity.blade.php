@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Activity Log</div>

                    <div class="panel-body">


                        @foreach($activities as $activity)
                            <?php $properties = json_decode($activity->properties,true);  ?>
                            <ul>
                                <li>Date : {{$activity->created_at}}</li>
                                <li>Activity Type: {{$activity->description}}</li>
                                <li>
                                    New Data:
                                    <ul>

                                        <li>Name : {{$properties['attributes']['name']}}</li>
                                        <li>Email : {{$properties['attributes']['email']}}</li>
                                        <li>Phone : {{$properties['attributes']['phone']}}</li>
                                        <li>Address : {{$properties['attributes']['address']}}</li>
                                        <li>Company : {{$properties['attributes']['company']}}</li>
                                        <li>Birth Data : {{$properties['attributes']['birth_date']}}</li>

                                    </ul>

                                </li>
                                <li>
                                    Old Data:
                                    <ul>

                                        <li>Name : {{$properties['old']['name']}}</li>
                                        <li>Email : {{$properties['old']['email']}}</li>
                                        <li>Phone : {{$properties['old']['phone']}}</li>
                                        <li>Address : {{$properties['old']['address']}}</li>
                                        <li>Company : {{$properties['old']['company']}}</li>
                                        <li>Birth Data : {{$properties['old']['birth_date']}}</li>

                                    </ul>

                                </li>
                            </ul>
                            <hr>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
