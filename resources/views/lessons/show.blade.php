@extends('layouts.base')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/lesson.css') }}">
@endpush

@push('js')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('/js/lesson.js') }}"></script>
@endpush

@section('content')
<h2 class="section-title lesson-name">{{ $lesson['lesson_name'] }}</h2>

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
            <div class="profile-widget-name"><span class="teacher-name">{{ $teacher->first_name }}  {{ $teacher->last_name }}</span>
                <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Thailand</div></div>
                <span class="introduction">{{ $teacher->introduction }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4>Lesson Detail</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="media">
                        <ion-icon name="pencil-outline"></ion-icon>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">About Lesson</h5>
                            <p class="lesson-content">{{ $lesson['content'] }}</p>
                        </div>
                    </li>
                    <li class="media my-4">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">Schedule</h5>
                            <p class="lesson-datetime">{{ date('Y-m-d', strtotime($lesson['start_date'])) }} <strong class="time">{{ config("const.TIME.". $lesson['start_time']) }}</strong></p>
                        </div>
                    </li>
                    <input type="hidden" id="lesson-id" value="{{ $lesson['id'] }}">
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <button class="btn btn-info take-button">Take This Lesson</button>
    <button class="btn btn-light cancel">Cancel</button>
</div>

@endsection
@section('modal')
<div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><div class="modal-title" id="myModalLabel">Do you take this lesson?</div></h4>
            </div>
            <div class="modal-body">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('storage/avatar-1.png')}}">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><span>Date</span> : <span class="date-schedule"></span></div>
                    <div class="article-title">
                      <h2><span class="title"></span></h2>
                    </div>
                    <p class="description"></p>
                    <div class="article-user">
                      <img alt="image" src="{{asset('storage/avatar-1.png')}}">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <span class="teacher"></span>
                        </div>
                        <div class="text-job profile"></div>
                      </div>
                    </div>
                  </div>
                </article>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="button" class="btn btn-primary take">Take!</button>
            </div>
        </div>
    </div>
</div>
@endsection