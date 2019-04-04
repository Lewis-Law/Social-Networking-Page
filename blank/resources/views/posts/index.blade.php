@extends('layouts.app')
@section('title')
    Posts index
@endsection

@section('content')
    <!-- Search Bar-->
    @if (count($errors) > 0)
        <form method="Post" action="/post/search/results/{search}">
            {{csrf_field()}}
        <p><label>Search User </label> <input type="text" name="search" > <input type="submit" value="search"><label class='alert'>{{ $errors->first('search') }}</label> </p>
        </form>
    @else
        <form method="Post" action="/post/search/results/{search}">
            {{csrf_field()}}
        <p><label>Search User </label> <input type="text" name="search" > <input type="submit" value="search"> </p>
        </form>
    @endif
    <!-- Create post -->
    @if (Auth::guest())
        <p>Log in to create a new post</p>
    @else
        <h1>Create a new Post</h1>
        
        @if (count($errors) > 0)
            <form method="POST" action="/post">
                {{csrf_field()}}
                <p><label>Title: </label><input type="text" name="title" value="{{ old('title') }}"><label class='alert'>{{ $errors->first('title') }}</label></p>
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"><label class='alert'>{{ $errors->first('message') }}</label></p>
                <p><select name="privacy">
                        <option value="private" selected="selected">private</option>
                        <option value="friends" selected="selected">friends</option>
                        <option value="public" selected="selected">public</option>
                        <label class='alert'>{{ $errors->first('privacy') }}</label>
                </select></p>
                <input type="submit" value="Create"> 
            </form>
        @else
            <form method="POST" action="/post">
                {{csrf_field()}}
                <p><label>Title: </label><input type="text" name="title" value="{{ old('title') }}"></p>
                <p><label>Message: </label><input type="text" name="message" value="{{ old('message') }}"></p>
                <p><select name="privacy">
                        <option value="private" selected="selected">private</option>
                        <option value="friends" selected="selected">friends</option>
                        <option value="public" selected="selected">public</option>
                </select></p>
                <input type="submit" value="Create"> 
            </form>
        @endif
    @endif       
     
    <!-- Displaying Post -->
    <!--  Check if user is logged in -->
    <!-- Display only Public post -->
    @if ($user == null)
        @foreach ($posts as $post)
                @if ($post->privacy == 'public')
                    <div>
                        <h1>Post</h1>
                        <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
                        <p>Name:{{$post->user1->name}}</p>
                        <p>Title: {{$post->title}}</p>
                        <p>Message: {{$post->message}}</p>
                        <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                    </div>
                @endif
        @endforeach
    <!-- User is logged in -->
    <!-- Check Post Privacy and display post -->
    @elseif ($user != null)
        @foreach ($posts as $post)   
            @if ($post->privacy == 'friends')
                @foreach ($user->friendship1 as $friends)
                    @if ($post->post_user_id == $friends->other_user_id)
                        <div>
                            <h1>Post</h1>
                            <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
                            <p>Name:{{$post->user1->name}}</p>
                            <p>Title: {{$post->title}}</p>
                            <p>Message: {{$post->message}}</p>
                            <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                        </div>
                    @elseif ($post->post_user_id == $user->id)
                        <div>
                            <h1>Post</h1>
                            <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
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
                    <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
                    <p>Name:{{$post->user1->name}}</p>
                    <p>Title: {{$post->title}}</p>
                    <p>Message: {{$post->message}}</p>
                    <a href="/post/{{$post->id}}">View Comments ({{count($post->comment)}})</a>
                </div>
            @elseif ($post->privacy == 'private')
                @if ($post->post_user_id == $user->id)
                    <div>
                        <h1>Post</h1>
                        <p><img src="{{url($post->user1->image)}}" style="width:50px;height:50px;"></p>
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