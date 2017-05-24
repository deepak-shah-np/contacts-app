@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contacts</div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                                <th>@lang('contact.name')</th>
                                <th>@lang('contact.email')</th>
                                <th>@lang('contact.phone')</th>
                                <th>@lang('contact.address')</th>
                                <th>@lang('contact.company')</th>
                                <th>@lang('contact.birth_date')</th>

                                <th>@lang('contact.age')</th>
                                <th>@lang('contact.action')</th>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact['name']}}</td>
                                        <td>{{$contact['email']}}</td>
                                        <td>{{$contact['phone']}}</td>
                                        <td>{{$contact['address']}}</td>
                                        <td>{{$contact['company']}}</td>
                                        <td>{{$contact['birth_date']}}</td>
                                        <td>{{$contact['age']}} {{($contact['age']==1)?"Year":"Years"}}</td>
                                        <td>
                                            <a href="{{route('contact_edit',['id'=>$contact['id']])}}">Edit</a>
                                            <a href="{{route('contact_soft_delete',['id'=>$contact['id']])}}" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                                            <a href="{{route('contact_detail',['slug'=>$contact['slug']])}}">Detail</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
