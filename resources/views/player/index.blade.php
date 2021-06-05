@extends('layout.app')

@section('title', 'Players')

@section('content')
    <div class="text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Player</th>
                    <th scope="col">Team</th>
                    <th scope="col">Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                <tr>
                    <th scope="row">
                        <img style="height: 29px; margin-right: 7px;" src={{ $player['avatarmedium'] }}/>
                        <a class="button" href= {{ $player['profileurl'] }}>{{ $player['personaname'] }}</a>
                    </th>
                    <td>
                        <a href={{ '/teams/' . $player['team_id'] }}>{{ $player['team_name'] }}</a>
                    </td>
                    <td>{{ $player['loccountrycode'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection