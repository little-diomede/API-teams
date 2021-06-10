@extends('players.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $player->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.show', $player->team_id) }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $player->username }}
            </div>
            <div class="form-group">
                <strong>Playernumber:</strong>
                {{ $player->playernumber }}
            </div>
            <div class="form-group">
                <strong>starter</strong>
                @if($player->starter)
                    Yes
                @else
                    No
                @endif
            </div>
            <div class="form-group">
                <strong>Joined at</strong>
                {{ $player->joined }}
            </div>
            <div class="form-group">
                <strong>Picture</strong>
                <img src="../img/player/{{$player->href}}" width="80" height="80">
            </div>
        </div>
    </div>

@endsection
