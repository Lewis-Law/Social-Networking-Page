@extends('layouts.app')
@section('title')
    Profile page
@endsection
@section('content')
    <p><img src="{{url($user->image)}}" style="width:300px;height:300px;"></p> 
    <h1>Name:{{$user->name}}</h1>
    <p>Age:{{$age->y}}</p>
    @if (Auth::id()==$user->id)
    @elseif(Auth::user())
        @if (count($friends) == 0)
            <form method="POST" action="/post/profile/{{$user->id}}">
                {{csrf_field()}}
                <input type="hidden" name="auth_user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="other_user_id" value="{{ $user->id }}">
                <input type="submit" value="Add {{$user->name}} as friend"> 
            </form>
        @elseif (count($friends)==1)
        <!-- already Friends -->
            <p>{{$user->name}} is already your friend</p>
            <form method="POST" action="/post/profile/{{$user->id}}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="Remove Friend" class="link">
            </form>
        @else
        <!-- duplicated friendship error -->
            <p>Something is wrong</p>
        @endif
    @elseif(Auth::guest())
        <p>Log in to add {{$user->name}} as friend</p>
    @endif
    <a href='/post/profile/{{$user->id}}/friends'>{{$user->name}}'s Friends list</a></p>
    @if (Auth::guest())
        @foreach ($posts as $post)
                @if ($post->privacy == 'public')
                    <div>
                        <h1>Post</h1>
                        <p>Name:{{$post->user1->name}}</p>
                        <p>Title: {{$post->title}}</p>
                        <p>Message: {{$post->message}}</p>
                        <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                    </div>
                @endif
        @endforeach
    @else
        @foreach ($posts as $post)   
            @if ($post->privacy == 'friends')
                @foreach (Auth::user()->friendship1 as $friends)
                    @if ($post->post_user_id == $friends->other_user_id)
                        <div>
                            <h1>Post</h1>
                            <p>Name:{{$post->user1->name}}</p>
                            <p>Title: {{$post->title}}</p>
                            <p>Message: {{$post->message}}</p>
                            <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                        </div>
                    @elseif ($post->post_user_id == Auth::user()->id)
                        <div>
                            <h1>Post</h1>
                            <p>Name:{{$post->user1->name}}</p>
                            <p>Title: {{$post->title}}</p>
                            <p>Message: {{$post->message}}</p>
                            <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                        </div>
                    @endif
                @endforeach
            @elseif ($post->privacy == 'public')
               <div>
                    <h1>Post</h1>
                    <p>Name:{{$post->user1->name}}</p>
                    <p>Title: {{$post->title}}</p>
                    <p>Message: {{$post->message}}</p>
                    <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                </div>
            @elseif ($post->privacy == 'private')
                @if ($post->post_user_id == Auth::user()->id)
                    <div>
                        <h1>Post</h1>
                        <p>Name:{{$post->user1->name}}</p>
                        <p>Title: {{$post->title}}</p>
                        <p>Message: {{$post->message}}</p>
                        <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                    </div>
                @endif
            @endif
        @endforeach
    @endif
@endsection