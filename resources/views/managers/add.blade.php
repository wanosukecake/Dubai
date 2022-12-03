<?php
    $title = 'User Add';
?>
@extends('layouts.base')
@push('js')
    <script src="{{ asset('/js/manager.js') }}"></script>
@endpush

@section('content')
<h2 class="section-title">User Add</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::open(['route' => 'manager.store']) !!}
                @include('managers._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection