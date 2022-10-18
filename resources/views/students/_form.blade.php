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
                    {{ Form::text('student[first_name]', $userStudent->student->first_name?? null, [
                        'class' => 'form-control' . ($errors->has('student.first_name') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                    @error('student.first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 col-12">
                {{ Form::label('last_name', 'Last Name', ['class' => '']) }}
                <div class="col-sm-12">
                    {{ Form::text('student[last_name]', $userStudent->student->last_name?? null, [
                        'class' => 'form-control' . ($errors->has('student.last_name') ? ' is-invalid' : ''),
                        'required'
                    ]) }}
                    @error('student.last_name')
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
                    {{ Form::text('student[age]', $userStudent->student->age?? null, [
                        'class' => 'form-control col-sm-5' . ($errors->has('student.age') ? ' is-invalid' : ''),
                    ]) }}
                    @error('student.age')
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
                        'student[sex]',
                        config('const.SEX'),
                        $userStudent->student->sex?? null,
                        ['class' => 'form-control col-sm-7' . ($errors->has('student.sex') ? ' is-invalid' : ''),'placeholder'=>'選択']) 
                    }}
                    @error('student.sex')
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
                        'student[introduction]',
                        $userStudent->student->introduction?? null,
                        ['class' => 'form-control introduction' . ($errors->has('student.introduction') ? ' is-invalid' : ''),'placeholder'=>'自己紹介を記載してください。']) 
                    }}
                    @error('student.introduction')
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

<!-- <div class="form-group">
    {{ Form::label('photo', '画像', ['class' => '']) }}
    <div class="col-sm-10">
        {{ Form::file(
            'student[photo]',
            ['class' => 'form-control' . ($errors->has('introduction') ? ' is-invalid' : ''),'placeholder'=>'自己紹介を記載してください。']) 
        }}
        @error('introduction')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div> -->