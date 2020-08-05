@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/clubs/create" class="btn btn-primary">Add Club</a>
                    <hr>
                    <h3>Clubs you have added:</h3>
                    @if (count($clubs) > 0)                    
                        <table class="table table-striped">
                            <tr>
                                <th>Clubs Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($clubs as $club)
                                <tr>
                                    <td>{{$club->club_name}}</td>
                                    <td><a href="/clubs/{{$club->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['ClubsController@destroy', $club->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not added any clubs to WikiFoot :(</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
