<?php
    $title = 'ユーザー情報編集';
?>
@push('css')
  <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
@endpush

@extends('layouts.base')

@section('content')
<h2 class="section-title">ユーザー情報編集</h2>

<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">                     
                <img alt="image" src="{{asset('storage/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Lessons</div>
                        <div class="profile-widget-item-value">18</div>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
            <div class="profile-widget-name">{{ @$userTeacher->teacher->first_name }}  {{ @$userTeacher->teacher->last_name }}
                <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Thailand</div></div>
                {!! @nl2br(e($userTeacher->teacher->introduction)) !!}
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
        {!! Form::model($userTeacher, [
            'route' => ['teacher.update', $userTeacher],
            'method' => 'put'

        ]) !!}
        @include('teachers._form')
        {!! Form::close() !!}
    </div>
</div>
@endsection