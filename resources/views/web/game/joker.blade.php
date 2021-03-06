@extends('web.layouts.master')
@section('style')
    <style>
        .game-card img {
            width: 100%;
        }
        .game-card .title {
            text-align: center;
        }
    </style>
    @php
        config(['site.page' => 'hot_game']);
        // $account = $game_account->username;
        // $password = $game_account->password;
        // $locale = session()->get('locale');
        // if($locale == "zh_cn") { $locale = 'CN'; }else{ $locale = 'En'; }
    @endphp
@endsection
@section('content')
    <div id="content" class="my-5">
        <div class="container">
            <h3 class="mt-4 text-center">Game List (Joker)</h3>
            <div class="row mb-3 justify-content-center">
                @foreach ($games as $item)
                    <div class="col-6 col-md-2 mt-2"><a href="javascript:void(0)" class="game-card" onclick="onClickGame('{{$item['GameCode']}}')"><img src="{{$item['Image1']}}" alt=""><h5 class="title">{{$item['Code']}}</h5></a></div>
                @endforeach
            </div>
        </div>
    </div>
    <form action="{{$client_url}}" method="POST" id="loginform" data-id="{{$token}}" hidden></form>
@endsection


@section('script')
    <script>
        function onClickGame(game_code) {
            show_loading();
            let domain = $("#loginform").attr('action');
            let token = $("#loginform").data('id');
            let url = domain + "?token=" + token + "&game=" + game_code + "&url=https://26wins.com";
            $("#loginform").attr('action', url);
            $("#loginform").submit();
        }
    </script>
@endsection