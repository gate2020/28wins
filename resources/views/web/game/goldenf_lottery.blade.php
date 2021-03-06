@extends('web.layouts.master')
@section('style')
    <style>
        .game-card {
            width: 100%;
            border-radius: 5px;
        }
        .game-card .title {
            margin-top: 5px;
            text-align: center;
        }
    </style>
    @php
        config(['site.page' => 'lottery']);
        $locale = session()->get('locale');
        if($locale == "zh_cn") { $locale = 'zh-CN'; }else{ $locale = 'en-US'; }
    @endphp
@endsection
@section('content')
    <div id="content" class="my-5">
        <div class="container">
            <h3 class="mt-4 text-center">Game List (Golden F)</h3>
            <div class="row px-2 mb-3 justify-content-center">
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_digitslottery" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                {{-- <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_combineking" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_winmine" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_knifethrow" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_marioru" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_treasurehun" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_skir" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_grabmoney" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_planecatch1943" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_sdragon" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_napkin" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_ninja" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_battle" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_baseball" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_digdig" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_shooting" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_ringtoss" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_basketball" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                
                <div class="col-4 col-md-2 mt-2 px-1"><a href="javascript:void(0)" class="icon-game" data-code="gps_planecatch" data-wallet="gf_gps_wallet" data-vendor="GPS"><img src="{{asset('games/goldenf_lottery/images/gps_digitslottery.jpeg')}}" class="game-card" alt=""></a></div>                 --}}
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            var id = "{{$game->id}}";
            var user_balance = "{{$_user->id}}";
            var game_balance = "{{$game->id}}";

            // $.ajax({
            //     url : "{{route('game.total_withdraw')}}",
            //     data : { id : "{{$game->id}}" },
            //     method : "POST",
            //     dataType : "json",
            //     success : function(response) {
            //         if(response == 'success') {
            //             console.log("success");
            //         }
            //     }
            // });

            $(".icon-game").click(function(){                
                let code = $(this).data('code');
                let wallet = $(this).data('wallet');
                let vendor = $(this).data('vendor');
                let url = "{{route('game.goldenf_lottery.play')}}" + "?code=" + code + "&wallet=" + wallet + "&vendor=" + vendor;
 
                var game_window = window.open(url,'','width=1024,height=768');
                // var timer = setInterval(function() { 
                //     if(game_window.closed) {
                //         clearInterval(timer);
                //         // alert('closed');
                //         $.ajax({
                //             url : "{{route('game.total_withdraw')}}",
                //             data : { id : "{{$game->id}}" },
                //             method : "POST",
                //             dataType : "json",
                //             success : function(response) {
                //                 if(response == 'success') {
                //                     window.location.reload();
                //                 }
                //             }
                //         });
                //     }
                // }, 300);
            });
        });
    </script>
@endsection