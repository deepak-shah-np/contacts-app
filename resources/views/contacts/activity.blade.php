@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading listheading"><b>@lang('contact.activity_log')</b></div>

                    <div class="panel-body">


                        @foreach($activities as $activity)
                            <?php $properties = json_decode($activity->properties,true);  ?>


                                    <div class="datatype">
                                        <span class="date"> <i class="fa fa-calendar"></i> {{$activity->created_at}}</span>
                                        <span class="activitytype"> {{ucfirst($activity->description)}}</span>
                                    </div>

                            <ul class="row removeli">



                                <li class="col-md-6">
                                    <span class="outerli">@lang('contact.new_data')</span>
                                    <ul>

                                        <li>@lang('contact.name') : {{$properties['attributes']['name']}}</li>
                                        <li>@lang('contact.email') : {{$properties['attributes']['email']}}</li>
                                        <li>@lang('contact.phone') : {{$properties['attributes']['phone']}}</li>
                                        <li>@lang('contact.address') : {{$properties['attributes']['address']}}</li>
                                        <li>@lang('contact.company') : {{$properties['attributes']['company']}}</li>
                                        <li>@lang('contact.birth_date') : {{$properties['attributes']['birth_date']}}</li>

                                    </ul>

                                </li>
                                @if(isset($properties['old']))
                                <li class="col-md-6">
                                    <span class="outerli">@lang('contact.old_data')</span>
                                    <ul>

                                        <li>@lang('contact.name') : {{$properties['old']['name']}}</li>
                                        <li>@lang('contact.email') : {{$properties['old']['email']}}</li>
                                        <li>@lang('contact.phone') : {{$properties['old']['phone']}}</li>
                                        <li>@lang('contact.address') : {{$properties['old']['address']}}</li>
                                        <li>@lang('contact.company') : {{$properties['old']['company']}}</li>
                                        <li>@lang('contact.birth_date') : {{$properties['old']['birth_date']}}</li>

                                    </ul>

                                </li>
                               @endif
                            </ul>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
