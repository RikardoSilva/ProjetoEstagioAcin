@extends('layouts.app')

@section('content')
    <h1>Edit Club's bio</h1>
    <hr>
    {!! Form::open(['action' => ['ClubsController@update', $club->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        {{-- Club's name --}}
        <div class="form-group">
            {{Form::label('club_name', "Club's name")}}
            {{Form::text('club_name', $club->club_name, ['class' => 'form-control', 'placeholder' => "Club's name"])}}
        </div>

        {{-- Body --}}
        <div class="form-group">
            {{Form::label('body', "History")}}
            {{Form::textarea('body', $club->body, ['class' => 'form-control', 'placeholder' => "Write here the club's history!"])}}
        </div>

        {{-- Clubs Country --}}
        <div class="form-group">
            {{Form::label('category_id', "Country")}}
            <select class="form-control" name="category_id">
                <?php $selectedvalue = $club->category_id ?>
                @foreach ($cat as $key => $value)
                    <option value="{{ $value->id }}" {{ $selectedvalue == $value['id'] ? 'selected="selected"' : '' }}>{{ $value->country }}</option>
                @endforeach
            </select>
        </div>

        {{-- Club's Logo (Optional) --}}
        <div class="form-group">
            {{Form::file('logo')}}
        </div>

        {{-- Submit --}}
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    
    {{-- To keep the main page not too close to the footer --}}
    <br>
    
@endsection