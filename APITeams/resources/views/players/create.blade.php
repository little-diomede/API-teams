@extends('players.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add a New player</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.show', $team_id) }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('players.store', ['team_id' => $team_id] )}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <strong>Playernumber:</strong>
                    <input type="text" name="playernumber" class="form-control" placeholder="Playernumber">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="starter" @if('starter')checked @endif value="1"><strong>
                        starter</strong></input>
                </div>
                <div class="form-group">
                    <strong>Joined at</strong>
                    <input type="date" name="joined" class="form-control">
                </div>
                <div class="form-group">
                    <strong>picture</strong>
                    <input type="text" name="href" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
@endsection
