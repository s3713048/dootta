@extends('layout.app')

@section('title', 'Heros')

@section('content')
    <div class="text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Hero</th>
                    <th scope="col">Wins (last 30 days)</th>
                    <th scope="col">Picks (last 30 days)</th>
                    <th scope="col">Bans (last 30 days)</th>
                    @if ($showSub)
                        <th scope="col"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($heros as $hero)
                <tr>
                    <th scope="row">
                        <img style="height: 29px; margin-right: 7px;" src={{ 'https://api.opendota.com' . $hero['img'] }}/>
                        <a class="button" href= {{ '/heros/' . $hero['id'] }}>{{ $hero['localized_name'] }}</a>
                    </th>
                    <td>{{ $hero['pro_win'] }}</td>
                    <td>{{ $hero['pro_pick'] }}</td>
                    <td>{{ $hero['pro_ban'] }}</td>
                    @if ($showSub)
                        <td>{{ $hero['subscribed'] }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection