@extends('layouts.app')

@section('content')
    <h1>Clubs</h1>
    @if (count($clubs) > 0)
        @foreach ($clubs as $club)
            <div class="well">
            <hr>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100px" src="/storage/logo/{{$club->logo}}" alt="{{$club->logo}}">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/clubs/{{$club->id}}">{{$club->club_name}}</a></h3>
                    <small>Added on {{$club->created_at}} by <b>{{$club->user->name}}</b> - {{ $club->category['country']}}</small>
                </div>
            </div>
            </div>
        @endforeach
        <br>
        <br>
        {{$clubs->links()}}
    @else
        <p>There are no clubs to show!</p>
    @endif
@endsection