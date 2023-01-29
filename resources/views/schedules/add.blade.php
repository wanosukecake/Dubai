@extends('layouts.base')
@extends('layouts.lesson')
@push('js')
    <script src="{{ asset('/js/teacherAddSchedule.js') }}"></script>
@endpush

@section('content')
<h2 class="section-title">スケジュール登録</h2>

<div id='calendar-container'>
    <div id='calendar'></div>
</div>

@endsection

@section('modal')
@include('schedules.modal_add_schedule')
@endsection