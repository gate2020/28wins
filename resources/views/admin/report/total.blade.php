@extends('admin.layouts.master')
@section('style')
    {{-- <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.min.css')}}">     --}}
    <link rel="stylesheet" href="{{asset('backend/plugins/jquery-ui-1.12.1/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/jquery-ui-1.12.1/timepicker/jquery-ui-timepicker-addon.min.css')}}">
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">{{__('words.total_agent_report')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-chart-bar"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold">{{__('words.total_agent_report')}}</h1>
                    <small>{{ ucfirst($top->role) }} - {{ $top->username }}</small>
                </div>
            </div>
        </div>
    </div> 
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body card-fill">
                    <div class="clearfix">
                        <form action="" class="form-inline float-left" method="post" id="searchForm">
                            @csrf
                            <select class="form-control form-control-sm mr-md-2" name="game_id" id="search_game">
                                <option value="" hidden>{{__('words.game')}}</option>
                                @foreach ($games as $item)
                                    <option value="{{$item->id}}" @if($game_id == $item->id) selected @endif>{{$item->title}}</option>
                                @endforeach                                
                            </select>
                            <input type="text" name="start_date" class="form-control form-control-sm datepicker mr-2" value="{{$start_date}}" id="search_start" placeholder="{{__('words.start_date')}}" autocomplete="off" />
                            <input type="text" name="end_date" class="form-control form-control-sm datepicker mr-2" value="{{$end_date}}" id="search_end" placeholder="{{__('words.end_date')}}" autocomplete="off" />
                        
                            <button type="submit" class="btn btn-sm btn-primary float-right mt-2 mt-md-0 mr-2"><i class="fas fa-search mr-1"></i>{{__('words.search')}}</button>
                            <button type="button" class="btn btn-sm btn-secondary float-right mt-2 mt-md-0" id="btn-reset"><i class="fas fa-eraser mr-1"></i>{{__('words.reset')}}</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                                <tr class="bg-blue">
                                    <th style="width:40px">#</th>
                                    <th>{{__('words.agent')}}</th>
                                    <th>{{__('words.win_lose')}}</th>
                                    <th>{{__('words.rate')}}</th>
                                    <th>{{__('words.commission')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_win_lose = 0;
                                    $total_commission = 0;
                                @endphp                             
                                @foreach ($agents as $item)
                                    @php
                                        $mod = $item->game_records();
                                        $mod = $mod->where('bet_date', '>=', $start_date);
                                        $mod = $mod->where('bet_date', '<=', $end_date);
                                        if($game_id != '') {
                                            $mod = $mod->where('game_id', $game_id);
                                        }
                                        $win_lose = $mod->sum('win_lose_amount');
                                        $rate = $item->rate ?? 0;
                                        $commission = $win_lose * $rate / 100;
                                        $total_win_lose += $win_lose;
                                        $total_commission += $commission;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="agent">
                                            <a href="{{route('admin.report.total', $item->id)}}">{{$item->username }}</a>                                            
                                        </td>
                                        <td class="win_lose">{{$win_lose}}</td>
                                        <td class="type"> {{$item->rate ?? 0}} % </td>
                                        <td class="commission">{{$commission}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>{{$total_win_lose}}</th>
                                    <th></th>
                                    <th>{{$total_commission}}</th>
                                </tr>
                            </tfoot>
                        </table> 
                    </div>
                </div>
            </div>
        </div>        
    </div>

@endsection
    
@section('script')
    {{-- <script src="{{asset('backend/plugins/daterangepicker/jquery.daterangepicker.min.js')}}"></script> --}}
    <script src="{{asset('backend/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-ui-1.12.1/timepicker/jquery-ui-timepicker-addon.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
            $("#btn-reset").click(function() {
                $("#search_game").val('');
                $("#search_start").val('');
                $("#search_end").val('');
            })
            
            $("#pagesize").change(function(){
                $("#pagesize_form").submit();
            });   
        });
    </script>
@endsection
