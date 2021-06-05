@extends('layout.app')

@section('title', 'Hero Details')

@section('content')
    <div class="text-center">

        <div class="card" style="width: 18rem;">
            <img src={{ 'https://api.opendota.com' . $hero['img'] }} class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $hero['localized_name'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $hero['attack_type'] . ' - ' . $hero['roles'] }}</h6>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Ranking</th>
                    <th scope="col">Player</th>
                    <th scope="col">Sorce</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankings as $ranking)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>
                        <img style="height: 29px; margin-right: 7px;" src={{ $ranking['avatar'] }}/>
                        {{ $ranking['personaname'] }}
                     </td>
                    <td>{{ $ranking['score'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection