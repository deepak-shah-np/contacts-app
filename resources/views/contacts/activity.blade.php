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
                                <li>@lang('contact.date') : {{$activity->created_at}}</li>
                                <li>@lang('contact.activity_type'): {{$activity->description}}</li>
                                <li>
                                    @lang('contact.new_data'):
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
                                <li>
                                    Old Data:
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
                            <hr>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
