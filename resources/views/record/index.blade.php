@inject('Record', 'App\Services\Record')
@extends('common.base')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>日期</th>
            <th>項目</th>
            <th>數量</th>
            <th>登記</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Record::getTodayRecords() as $r)
        @if (0 < $r->modified_at)
        <tr class="info">
        @else
        <tr class="danger">
        @endif
            <td>{{$r->created_at}}</td>
            <td>{{$r->getName()}}</td>
            <td>{{ intval($r->value)}} {{$r->getUnit()}}</td>
            @if (0 < $r->modified_at)
            <td>已登記</td>
            @else
            <td>未登記</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="{{url('record/create')}}">新增</a>
@endsection
