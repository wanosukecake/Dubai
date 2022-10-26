@extends('layouts.base')
@extends('layouts.schedule')
@push('js')
    <script src="{{ asset('/js/studentSchedule.js') }}"></script>
@endpush

@section('content')
<h2 class="section-title">レッスン登録状況</h2>

<div id='calendar-container'>
    <div id='calendar'></div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
                    <div class="article-category"><span>Date</span><div class="bullet"></div> <span class="date-schedule">2022/10/16</span></div>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary take">受講する</button>
            </div>
        </div>
    </div>
</div>
@endsection