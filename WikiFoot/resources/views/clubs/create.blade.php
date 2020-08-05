@extends('layouts.app')

@section('content')
    <h1>Add Club</h1>
    <p>Are there are missing clubs? Well, yea, I'm not a walking wikipedia, but feel free to add one!</p>
    <hr>
    {!! Form::open(['action' => 'ClubsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        {{-- Club's name --}}
        <div class="form-group">
            {{Form::label('club_name', "Club's name")}}
            {{Form::text('club_name', '', ['class' => 'form-control', 'placeholder' => "Club's name", 'required'])}}
        </div>

        {{-- Body --}}
        <div class="form-group">
            {{Form::label('body', "History")}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => "Write here the club's history!", 'required'])}}
        </div>

        {{-- Clubs Country --}}
        <div class="form-group">
            {{Form::label('category_id', "Country")}}
            <select class="form-control" name="category_id">
                @foreach ($cat as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->country }}</option>
                @endforeach
            </select>
        </div>

        {{-- Club's Logo (Optional) --}}
        <p>Please use a small logo for design purposes. (Recommended: <= ~500x500)</p>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        
        {{-- Submit --}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
@endsection