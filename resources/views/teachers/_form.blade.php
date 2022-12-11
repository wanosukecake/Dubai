<div class="card">
    <div class="card-header">
        <h4>Edit Profile</h4>
    </div>
    <div class="card-body">
        <div class="row">                               
            <div class="form-group col-md-12 col-12">
                {{ Form::label('password', 'Password', ['class' => '']) }}
                <div class="col-sm-10">
                    {{ Form::password('user[password]',
                        [
                            'class' => 'form-control' . ($errors->has('user.password') ? ' is-invalid' : ''),
                        ])
                    }}
                    @error('user.password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-12">
            {{ Form::label('first_name', 'First Name', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::text('teacher[first_name]', $userTeacher->teacher->first_name?? null, [
                        'class' => 'form-control' . ($errors->has('teacher.first_name') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                    @error('teacher.first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 col-12">
                {{ Form::label('last_name', 'Last Name', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::text('teacher[last_name]', $userTeacher->teacher->last_name?? null, [
                        'class' => 'form-control' . ($errors->has('teacher.last_name') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                    @error('teacher.last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-6 col-12">
            {{ Form::label('age', 'Age', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::text('teacher[age]', $userTeacher->teacher->age?? null, [
                        'class' => 'form-control col-sm-5' . ($errors->has('teacher.age') ? ' is-invalid' : ''),
                    ]) }}
                    @error('teacher.age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 col-12">
            {{ Form::label('sex', 'Gender', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::select(
                        'teacher[sex]',
                        config('const.SEX'),
                        $userTeacher->teacher->sex?? null,
                        ['class' => 'form-control col-sm-7' . ($errors->has('teacher.sex') ? ' is-invalid' : ''),'placeholder'=>'選択']) 
                    }}
                    @error('teacher.sex')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-12 col-12">
                {{ Form::label('introduction', 'Message', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::textarea(
                        'teacher[introduction]',
                        $userTeacher->teacher->introduction?? null,
                        ['class' => 'form-control introduction' . ($errors->has('teacher.introduction') ? ' is-invalid' : ''),'placeholder'=>'自己紹介を記載してください。']) 
                    }}
                    @error('teacher.introduction')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>