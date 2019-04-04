@extends('layouts.app')
@section('title')
    Friends list
@endsection
@section('content')
    <h1>{{$user->name}}'s friends</h1>
    @foreach ($friends as $friend)
        <p><img src="{{url($friend->other->image)}}" style="width:50px;height:50px;">
        <a href='/post/profile/{{$friend->other->id}}'>{{$friend->other->name}}</a></p>
    @endforeach
@endsection