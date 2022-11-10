@extends('layouts.base')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/lesson.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" />
@endpush

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('/js/lesson.js') }}"></script>
@endpush

@section('content')
<h2 class="section-title">レッスン一覧</h2>

{!! Form::open([
        'route' => ['lesson.index'],
        'method' => 'get'
    ]) !!}
    @include('lessons._search')
{!! Form::close() !!}

@foreach($lessons as $key => $value)
    @if ($loop->first || ($loop->iteration -1) % 3 == 0)
        <div class="row">
    @endif
            <div class="col-12 col-md-4 col-lg-4">
                <a href="#">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image" data-background="{{asset('storage/avatar-1.png')}}"></div>
                        </div>
                        <div class="article-details">
                            <div class="article-category">
                                @foreach($value['categories'] as $k => $val)
                                    <span class="badge badge-info categories">{{ $val['category_name'] }}</span>
                                @endforeach
                            </div>
                            <div class="article-title">
                                <h2>
                                    <span>{{ $value['lesson_name'] }}
                                    @if ($value['isNew'])
                                            <span class="badge badge-secondary new">New</span>
                                        @endif 
                                    </span>
                                </h2>
                            </div>
                            <p>{{ $value['start_date'] }} <strong class="time">{{ config("const.TIME.". $value['start_time']) }}</strong></p>
                            <p>{{ $value['content'] }}</p>
                            <div class="article-user">
                                <img alt="image" src="{{asset('storage/avatar-1.png')}}" loading="lazy">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="/index">{{ $value['first_name'] }} {{ $value['last_name'] }}</a>
                                    </div>
                                    <div class="text-job">AGE:{{ $value['age'] }} {{ config("const.SEX.". $value['sex']) }}</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
    @if ($loop->iteration % 3 == 0 || $loop->last)
        </div>
    @endif
@endforeach
<div class="pager">
    {{ $lessons->appends(request()->query())->links() }}
</div>
@endsection