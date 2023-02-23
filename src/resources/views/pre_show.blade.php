<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href={{ asset("css/style_show.css") }}>
</head>
<body>
<h2 class="title">{{$forum->name}}</h2>
<div class="picture">
    <img src="{{ asset("storage/$forum->image") }}" width="auto" height="600">
</div>
<div class="content">{{$forum->content}}</div>
<div>Автор статьи: {{$forum->author}}</div>

@if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
    <form class="form_delete" action="{{ route('destroy', ['forum' => $forum->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endif
{{--{{ $errors }}--}}
<a class="redaction" href="{{ route("edit", ['forum' => $forum->id]) }}">Редактировать</a>
<a class="redaction" href="{{ route("public_theme", ['forum' => $forum->id]) }}">Опубликовать</a>
{{--<form class="form_style" name="feedback" method="POST" action="{{ '/forums/'.$forum->id }}">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}

{{--    <div><label class="title_ger"><input type="submit" name="pub" value="Опубликовать"></label></div>--}}
{{--</form>--}}

@foreach($forum->comments as $comment)
    <div class="comments">Комментарий от {{$comment->name}} </div>
    <div class="comment">{{$comment->comment}}</div>
@endforeach
</body>
</html>
