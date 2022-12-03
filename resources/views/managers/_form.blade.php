<div class="card">
    <div class="card-header">
        <h4>User Create</h4>
    </div>
    <div class="card-body">
        <div class="row">                               
            <div class="form-group col-md-8">
                {{ Form::label('email', 'email address', ['class' => '']) }}
                <div>
                    {{ Form::email('inputEmail', null, ['class' => 'form-control','id' => 'inputEmail']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('userType', 'User Type', ['class' => '']) }}
                <div class="col-md-9 form-inline">
                    @foreach(config('const.USER_TYPE') as $key => $value)
                    <div class="form-inline">
                        {{ Form::radio('userType', $key , null , ['class' => 'form-control mx-1', 'id' => 'userType'.$key ]) }}
                        {{ Form::label('userType'.$key , $key) }}
                    </div>
                    @endforeach
                </div>
                @if($errors->has('userType'))
                    @foreach($errors->get('userType') as $message)
                        <p class="offset-3 col-md-9 alert alert-danger">{{ $message }}</p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-10">
                {{ Form::label('password', 'Password', ['class' => '']) }}
                <div class="d-flex">
                    {{ Form::text('password', null, [
                        'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-3">
                        <input type="button" value="Temp Password Issue" class="btn btn-primary js-temp_password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</div>
