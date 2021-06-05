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
                        <form method="POST" action="/heros/detail">
                            <img style="height: 29px; margin-right: 7px;" src={{ 'https://api.opendota.com' . $hero['img'] }}/>
                            @csrf
                            <input class="visually-hidden" type="hidden" name="hero_data" id="hero_data" value={{ json_encode($hero) }}>
                            <button class="btn btn-link" type="submit">{{ $hero['localized_name'] }}</button>                     
                        </form>
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