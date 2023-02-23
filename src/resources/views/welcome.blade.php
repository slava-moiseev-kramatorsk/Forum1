<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>

    <link rel="stylesheet" href={{ asset("css/style.css") }}>


</head>
@extends('layouts.app')

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
<body>
<div class="hello_user"> Добро пожаловать, {{$user = auth()->user()->name}}</div>
<a href="Page.vue"> On Vue</a>
<div class="line3">
    <div>
        <ul class="">
            <li><a class="text_menu2" href="#">Новости</a></li>
            <li><a class="text_menu2" href="{{route('addTheme')}}">Добавить тему</a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
            <li><a class="text_menu2" href="{{route('new_public')}}">Новые добавления</a></li>
            @endif
        </ul>
    </div>

</div>

<div class="container">
    <div class="title_column">
        <div class="title_number">Номер</div>
        <div class="title_name">Название темы</div>
        <div class="title_view">Автор</div>
        <div class="title_view">Комментарии</div>
    </div>
    @isset($forums)
    @foreach($forums as $forum)
        <div class="line1">

            <div class="number_theme">{{$loop->index+1}}</div>
            <div class="name_theme" ><a class="href_theme" href="{{ route('show', ['forum' => $forum->id]) }}">{{$forum->name}}</a></div>

            <div class="view_theme">
                <a href=""> {{$forum->author}}</a></div>
            <div class="comments_theme">{{$forum->comments->count()}}</div>
        </div>
@endforeach
@endisset

</body>
</html>
{{--{{route('show-user-profile', ['user' => $user->id])}} ссылка на профиль автора--}}
