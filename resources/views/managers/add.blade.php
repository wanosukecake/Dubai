<?php
    $title = 'ユーザー新規追加';
?>
@push('css')
  <link rel="stylesheet" href="{{ asset('css/student.css') }}">
@endpush

@extends('layouts.base')

@section('content')
<h2 class="section-title">ユーザー新規追加</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ユーザー新規追加') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('manager.store') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('作成種別') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="user_type" class="form-check-input" id="typeTeacher" value="1" {{ old ('user_type') == '1' ? 'checked' : '' }} checked>
                                    <label for="type1" class="form-check-label">先生</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="user_type" class="form-check-input" id="typeStudent" value="2" {{ old ('user_type') == '2' ? 'checked' : '' }} checked>
                                    <label for="type2" class="form-check-label">生徒</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <input type="button" value="仮パスワード発行" onclick="createTempPassword();" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('仮パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="is_initial_setting" value="0">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/manager.js') }}"></script>
@endsection