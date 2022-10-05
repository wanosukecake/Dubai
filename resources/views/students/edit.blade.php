<?php
    $title = '投稿編集';
?>
@extends('layouts.base')

@section('content')
<h2 class="section-title">ユーザー情報編集</h2>

<!-- 
                  <div class="card-body">
                    <div class="form-group">
                      <label>Default Input Text</label>
                      <input type="text" class="form-control">
                    </div> -->
<div class="card">
    <div class="card-body">
        {!! Form::model($userStudent, [
            'route' => ['student.update', $userStudent],
            'method' => 'put'

        ]) !!}
        @include('students._form')
        {!! Form::close() !!}
    </div>
</div>
@endsection