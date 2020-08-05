@extends('layouts.app')

@section('content')
    {{-- <h1>{{$title}}</h1> This is other way --}}
    <h1><?php echo $title ?></h1>
    <p>The year is 2020 and an epidemic, Covid-19 (CoronaVirus), has taken the whole world, 
        shutting down everything there is.</p>
    <br>
    <p> We had just started the intership at Acin and it had to be stopped for prevention. 
        But the course had to continue and we couldn't be at home doing nothing, 
        so we were asked to do a website using the programming language we were going to use during the time at Acin.</p>

    <p>I got Progressive Web Apps (PWA), which basically consists on converting a website into an app, 
        and can also be used offline if the user has already downloaded the page, 
        so it can be stored in cache to be used later.</p>

    <p>Since I was still in the investigation part of this technology, I can't do a full working website because, 
        to be honest, I don't know how, so I decided to use a technology where I fell more comfortable, 
        and also to do something that can really be "nice", fully working, and can be evaluated.</p>

    <p>This WikiFoot is <strong>ONLY</strong> available to <strong>TOP 6 EUROPEAN LEAGUES</strong> according to UEFA coefficients till august 2020</p>
@endsection

