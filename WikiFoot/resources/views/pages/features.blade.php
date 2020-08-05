@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>This website is still in development, and these are some of things that are going to be added soon!</p>
    @if (count($features)>0)
        <ul>
            @foreach ($features as $feature)
                <li class="list-group-item">{{$feature}}</li>
            @endforeach
        </ul>
    @endif
@endsection
        
