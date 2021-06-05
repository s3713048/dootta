@extends('layout.app')

@section('title', 'Team')

@section('content')
    <div class="text-center">

        <div class="card" style="width: 18rem;">
            <img src={{ $team['logo_url'] }} class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $team['name'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ 'Rating' . ' - ' . $team['rating'] }}</h6>
                <p class="card-text">{{ 'Wins: ' . $team['wins'] . ' Losses: ' . $team['losses'] }}</p>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Result</th>
                    <th scope="col">Opposing Team</th>
                    <th scope="col">Duration</th>
                    <th scope="col">League</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                <tr>
                    <th scope="row">
                        @if ($match['radiant_win'] == $match['radiant'])
                            Win
                        @else
                            Lose
                        @endif                    
                    </th>
                    <td>
                        <img style="height: 29px; margin-right: 7px;" src={{ $match['opposing_team_logo'] }}/>
                        <a href={{ '/teams/' . $match['opposing_team_id'] }}>{{ $match['opposing_team_name'] }}</a>
                    </td>
                    <td>{{ $match['duration'] }}</td>
                    <td>{{ $match['league_name'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection