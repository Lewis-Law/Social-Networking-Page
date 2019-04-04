@extends('layouts.master')
@section('title')
    Post Edit
@endsection
@section('content')

    <form method="POST" action="/post/{{$post->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        @if (count($errors) > 0)
            <input type="hidden" name="post_user_id" value="{{ $post->post_user_id }}">
            <p><label>Title: </label><input type="text" name="title" value="{{ old('title') }}"> {{ $errors->first('title') }}</p> 
            <p><label>Message: </label><input type="text" name="title" value="{{ old('message') }}">{{ $errors->first('message') }}</p>
            <p><select name="privacy">
                    <option value="private" selected="selected">private</option>
                    <option value="friends" selected="selected">friends</option>
                    <option value="public" selected="selected">public</option>
                    <label class='alert'>{{ $errors->first('privacy') }}</label>
            </select></p>
        @else
            <input type="hidden" name="post_user_id" value="{{ $post->post_user_id }}">
            <p><label>title</label><input type="text" name="title" value="{{$post->title}}"></p>
            <p><label>message</label><input type="text" name="message" value="{{$post->message}}"><br></p>
            <p><select name="privacy">
                    <option value="private" selected="selected">private</option>
                    <option value="friends" selected="selected">friends</option>
                    <option value="public" selected="selected">public</option>
            </select></p>
        @endif
        </select>
        <input type="submit" value="Update">
    </form>
@endsection