@inject('Record', 'App\Services\Record')
@extends('common.base')
@section('content')
<?php $sum = [1 => 0, 2 => 0, 101 => 0, 102 => 0];?>
<table id="fixed-header" class="table">
        <tr>
            <th id="fixed-time">時間</th>
            <th id="fixed-water">喝水</th>
            <th id="fixed-food">吃飯</th>
            <th id="fixed-piss">小號</th>
            <th id="fixed-pupu">大號</th>
            <th id="fixed-modify" class="col-sx-1 text-right">登記</th>
        </tr>
</table>
<table id="flow-table" class="table">
    <thead>
        <tr>
            <th colspan="4">{{date('Y-m-d')}}</th>
        </tr>
        <tr>
            <th id="flow-time">時間</th>
            <th id="flow-water">喝水</th>
            <th id="flow-food">吃飯</th>
            <th id="flow-piss">小號</th>
            <th id="flow-pupu">大號</th>
            <th id="flow-modify" class="col-sx-1 text-right">登記</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Record::getTodayRecords() as $r)
        <?php
            $sum[$r->attribute_id] += $r->value;
         ?>
        @if (0 < $r->modified_at)
        <tr class="info">
        @else
        <tr>
        @endif
            <td>{{$r->getShortTime()}}</td>
            @foreach ([1, 2, 101, 102] as $niddle)
                @if ($niddle == $r->attribute_id)
            <td>{{ intval($r->value)}} <small class="unit">{{$r->getUnit()}}</small></td>
                @else
            <td></td>
                @endif
            @endforeach
            @if (0 < $r->modified_at)
            <td><i class="glyphicon  glyphicon-ok pull-right"></i></td>
            @else
            <td id="modify-{{$r->id}}"><button class="btn btn-danger btn-mini pull-right" data-function="modify" data-id="{{$r->id}}"><i class="glyphicon  glyphicon-remove"></i></button></td>
            @endif
        </tr>
        @endforeach
        <tr class="info">
            <td>小計</td>
            <td>{{$sum[1]}} <small class="unit">公克</small></td>
            <td>{{$sum[2]}} <small class="unit">公克</small></td>
            <td>{{$sum[101]}} <small class="unit">公克</small></td>
            <td>{{$sum[102]}} <small class="unit">次</small></td>
            <td></td>
        </tr>
        <tr class="success">
            <td>總結</td>
            @if ($Record::getSummaryByDay() > 0)
            <td colspan="5">今天到目前為止增加了 {{$Record::getSummaryByDay()}} 公克</td>
            @else
            <td colspan="5">今天到目前為止減少了 {{ -$Record::getSummaryByDay()}} 公克</td>
            @endif
        </tr>
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="{{url('record/create')}}">新增</a>
@endsection
@section('bottom-script')
<script src="/js/record.min.js"></script>
@endsection
