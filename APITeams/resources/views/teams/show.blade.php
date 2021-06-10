@extends('teams.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{$team->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>winrate</strong>
            {{ $team->winrate }}
        </div>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Team logo</strong>
                <img src="../img/team/{{$team->href}}" width="80" height="80">
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>players</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('players.create', ['team_id' => $team->id]) }}"> Add a New Player</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Playernumber</th>
            <th>starter player</th>
            <th>joined at</th>
            <th>picture</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($team->players as $player)
            <tr>
                <td>{{ $player->username }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->playernumber }}</td>
                <td>
                    @if($player->starter)
                        Yes
                    @else
                        No
                    @endif</td>
                <td>{{ $player->joined }}</td>
                <td><img src="../img/player/{{$player->href}}" width="80" height="80"></td>

                <td>
                    <form action="{{ route('players.destroy',$player->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('players.show',$player->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('players.edit',$player->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
