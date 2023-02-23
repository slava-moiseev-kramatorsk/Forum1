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
<div class="author_theme">Автор статьи: {{$forum->author}}</div>

@if(\Illuminate\Support\Facades\Auth::user()->role->name == 'Admin')
<form class="form_delete" action="{{ route('destroy', ['forum' => $forum->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить</button>
</form>
@endif

@if(\Illuminate\Support\Facades\Auth::user()->name == $forum->author)
<a class="redaction" href="{{ route("edit", ['forum' => $forum->id]) }}">Редактировать</a>
@endif

<form action="{{route('create_comment', ["forum" => $forum->id])}}" method="POST">
    @csrf
<div class="add_comment"><label >Добавить коммнтарий</label></div>
    <input type="hidden" name="user_name" value="{{$user = auth()->user()->name}}">
    <input type="hidden" name="forum_id" value="{{$forum->id}}">
<textarea type="text" name="comment"></textarea>
    <button type="submit" class="btn btn-danger">Добавить</button>
</form>

@foreach($forum->comments as $comment)
    <div class="comments">Комментарий от {{$comment->name}} </div>
    <div class="comment">{{$comment->comment}}</div>

{{--    second comment--}}
    <form  class="reply_invisible" id="second_comment" action="{{route('create_comment', ["forum" => $forum->id])}}" method="POST">
        @csrf
        <div class="add_comment"><label >Ответить</label></div>
        <input type="hidden" name="user_name" value="{{$user = auth()->user()->name}}">
        <input type="hidden" name="forum_id" value="{{$forum->id}}">
        <textarea></textarea>
        <button type="submit" class="btn btn-danger">Добавить</button>
    </form>


@endforeach
<script>

</script>
</body>
</html>
