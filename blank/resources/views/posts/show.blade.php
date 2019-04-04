@extends('layouts.app')
@section('title')
    Post show
@endsection
@section('content')
    @if($post->privacy == 'private')
        @if ($user_id == $post->post_user_id)
            <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
            <h1>{{$post->user1->name}}</h1>
            <p>Title: {{$post->title}}</p>
            <p>Message: {{$post->message}}</p>
            
            @if ($user_id == $post->post_user_id)
                <p><a href='/post/{{$post->id}}/edit'>Edit Post</a></p>
                <form method="POST" action="/post/{{$post->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="link">
                </form>
            @endif
        
            <br>
            <h1>Comments:</h1>
            @foreach ($comments as $comment)
                <div>
                    <p><img src="{{url($comment->user1->image)}}" style="width:50px;height:50px;"></p>
                    <p>Name: {{$comment->user1->name}}</p>
                    <p>Message: {{$comment->message}}</p>
                </div>
                {{$comment->updated_at}}
                <p>
                @if ($user_id == $comment->user_id)
                    <form method="POST" action="/post/{{$comment->post_id}}/{{$comment->id}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="link">
                    </form>
                @endif
                </p>
                </br>
            @endforeach
            {{ $comments->links()}}
            
            <h1>Create a new Comment</h1>
            @if (count($errors) > 0)
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"><label class='alert'>{{ $errors->first('message') }}</label></p>
                <input type="submit" value="Create"> 
            </form>
        
            @else
            
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"></p>
                <input type="submit" value="Comment"> 
            </form>
            @endif
        @else
            <p>This is a private post</p>
        @endif
    @elseif($post->privacy == 'friends')
        @if (count($friends) == 1)
            <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
            <h1>{{$post->user1->name}}</h1>
            <p>Title: {{$post->title}}</p>
            <p>Message: {{$post->message}}</p>
            
            @if ($user_id == $post->post_user_id)
                <p><a href='/post/{{$post->id}}/edit'>Edit Post</a></p>
                <form method="POST" action="/post/{{$post->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="link">
                </form>
            @endif
        
            <br>
            <h1>Comments:</h1>
            @foreach ($comments as $comment)
                <div>
                    <p><img src="{{url($comment->user1->image)}}" style="width:50px;height:50px;"></p>
                    <p>Name: {{$comment->user1->name}}</p>
                    <p>Message: {{$comment->message}}</p>
                </div>
                {{$comment->updated_at}}
                <p>
                @if ($user_id == $comment->user_id)
                    <form method="POST" action="/post/{{$comment->post_id}}/{{$comment->id}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="link">
                    </form>
                @endif
                </p>
                </br>
            @endforeach
            {{ $comments->links()}}
            
            <h1>Create a new Comment</h1>
            @if (count($errors) > 0)
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"><label class='alert'>{{ $errors->first('message') }}</label></p>
                <input type="submit" value="Create"> 
            </form>
        
            @else
            
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"></p>
                <input type="submit" value="Comment"> 
            </form>
            @endif
        @else
            <p>This post is for {{$post->user1->name}}'s friends only</p>
        @endif
    @else
        <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
        <h1>{{$post->user1->name}}</h1>
        <p>Title: {{$post->title}}</p>
        <p>Message: {{$post->message}}</p>
        
        @if ($user_id == $post->post_user_id)
            <p><a href='/post/{{$post->id}}/edit'>Edit Post</a></p>
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete" class="link">
            </form>
        @endif
    
        <br>
        <h1>Comments:</h1>
        @foreach ($comments as $comment)
            <div>
                <p><img src="{{url($comment->user1->image)}}" style="width:50px;height:50px;"></p>
                <p>Name: {{$comment->user1->name}}</p>
                <p>Message: {{$comment->message}}</p>
            </div>
            {{$comment->updated_at}}
            <p>
            @if ($user_id == $comment->user_id)
                <form method="POST" action="/post/{{$comment->post_id}}/{{$comment->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="link">
                </form>
            @endif
            </p>
            </br>
        @endforeach
        {{ $comments->links()}}
        @if (auth::guest())
            <p>Log in to make a comment!</p>
        @else
            <h1>Create a new Comment</h1>
            @if (count($errors) > 0)
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"><label class='alert'>{{ $errors->first('message') }}</label></p>
                <input type="submit" value="Create"> 
            </form>
        
            @else
            
            <form method="POST" action="/post/{{$post->id}}">
                {{csrf_field()}}
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"></p>
                <input type="submit" value="Comment"> 
            </form>
            @endif
        @endif
    @endif
@endsection