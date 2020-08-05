@extends('layouts.app')

@section('content')
<button onclick="goBack()" class="btn btn-default">Go Back</button>
    <h1>{{$club->club_name}}</h1>
    <img style="width:100px" src="/storage/logo/{{$club->logo}}" alt="{{$club->logo}}">
    <hr>
    <div>
        <h3>History</h3>
        <br>
        {{$club->body}}
    </div>
    <br>
    <hr>
    <h3>Info</h3>
    <h6>Country: {{ $club->category['country']}}</h6>
    <small>Added on {{$club->created_at}}</small>
    <hr>

    @if (!Auth::guest()) {{-- Checks if the user is logged in or is a guest --}}
        @if (Auth::user()->id == $club->user_id) {{-- Checks if the user is the one who added the club --}}
        
            <a href="/clubs/{{$club->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['ClubsController@destroy', $club->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Remove', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            
        @endif
    @endif

    {{-- To keep the main page not too close to the footer --}}
    <br>
    <br>

@endsection