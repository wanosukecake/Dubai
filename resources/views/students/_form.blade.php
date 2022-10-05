<div class="form-group">
    {{ Form::label('password', 'パスワード', ['class' => '']) }}
    <div class="col-sm-10">
        {{ Form::text('user[password]', null, [
            'class' => 'form-control' . ($errors->has('user.password') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('user.password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
 
<div class="form-group">
    {{ Form::label('first_name', '苗字', ['class' => '']) }}
    <div class="col-sm-10">
        {{ Form::text('student[first_name]', $userStudent->student->first_name?? null, [
            'class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('first_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group">
    {{ Form::label('last_name', '名前', ['class' => '']) }}
    <div class="col-sm-10">
        {{ Form::text('student[last_name]', $userStudent->student->last_name?? null, [
            'class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('last_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group">
    {{ Form::label('age', '年齢', ['class' => '']) }}
    <div class="col-sm-2">
        {{ Form::text('student[age]', $userStudent->student->age?? null, [
            'class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('age')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group">
    {{ Form::label('sex', '性別', ['class' => '']) }}
    <div class="col-sm-2">
        {{ Form::select(
            'student[sex]',
            config('const.Sex'),
            $userStudent->student->sex?? null,
            ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : ''),'placeholder'=>'選択']) 
        }}
        @error('sex')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</div>