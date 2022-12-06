<div class="card">
    <div class="card-header">
        <h4>User Create</h4>
    </div>
    <div class="card-body">
        <div class="row">                               
            <div class="form-group col-md-8">
                {{ Form::label('email', 'Email Address', ['class' => '']) }}
                <div>
                    {{ Form::email('email', null, [
                        'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                </div>
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $message)
                        <p class="offset-3 col-md-9 alert alert-danger">{{ $message }}</p>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::label('user_type', 'User Type', ['class' => '']) }}
                <div class="col-md-9 form-inline">
                    @foreach(config('const.USER_TYPE') as $key => $value)
                    <div class="form-inline">
                        {{ Form::radio('user_type', $value , null , ['class' => 'form-control mx-1', 'id' => 'user_type' . '_' . $key ]) }}
                        {{ Form::label('user_type' . '_' .$key , $key) }}
                    </div>
                    @endforeach
                </div>
                @if($errors->has('user_type'))
                    @foreach($errors->get('user_type') as $message)
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
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            <p class="offset-3 col-md-9 alert alert-danger">{{ $message }}</p>
                        @endforeach
                    @endif
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
