<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">@lang('contact.name')</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{(isset($contact->name))?$contact->name:old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">@lang('contact.email')</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="email" value="{{ (isset($contact->email))?$contact->email:old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-md-4 control-label">@lang('contact.phone')</label>

    <div class="col-md-6">
        <input id="phone" type="text" class="form-control" name="phone" value="{{isset($contact->phone)?$contact->phone:old('phone')}}" required autofocus>

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">@lang('contact.address')</label>

    <div class="col-md-6">
        <textarea id="address" type="text" class="form-control" name="address" required autofocus>{{isset($contact->address)?$contact->address:old('address') }}</textarea>

        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
    <label for="company" class="col-md-4 control-label">@lang('contact.company')</label>

    <div class="col-md-6">
        <input id="company" type="text" class="form-control" name="company" value="{{ isset($contact->company)?$contact->company:old('company') }}" required autofocus>

        @if ($errors->has('company'))
            <span class="help-block">
                <strong>{{ $errors->first('company') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    <label for="birth_date" class="col-md-4 control-label">@lang('contact.birth_date')</label>

    <div class="col-md-6">
        <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{isset($contact->birth_date)?$contact->birth_date:old('birth_date')}}" required autofocus>

        @if ($errors->has('birth_date'))
            <span class="help-block">
                <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</div>



