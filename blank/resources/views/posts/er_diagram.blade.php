@extends('layouts.app')
@section('title')
    Doccument
@endsection
@section('content')
    <h1>ER diagram</h1>
    <img src="posts_images/er_diagram.png">
    <br>
    <h1>Task Details:</h1>
    <p>Things I am not able to complete:</p>
    <ul>
        <li>Not seeding User Images</li>
    </ul>
    <p>Interesting Approaches:</p>
    <ul>
        <li>I made the friendship database as two sided friendship so it can easily be changed to one sided adding friends</li>
        <li>I had to make 1 to 1 relationship from other tables to go back to the user table for getting the user->name and other user's details</li>
    </ul>
    <p>Things I am able to complete:</p>
    <ul>
        <li>Most or all requirements</li>
    </ul>
    
@endsection