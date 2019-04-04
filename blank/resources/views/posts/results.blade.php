@extends('layouts.app')
@section('title')
    Search Results
@endsection

@section('content')
    <h1>Search Results</h1>
    @foreach ($results as $result)
        <p>
            <a href='/post/profile/{{$result->id}}'>
                <img src="{{url($result->image)}}" style="width:50px;height:50px;">
                {{$result->name}}
            </a>
        </p>
    @endforeach
@endsection