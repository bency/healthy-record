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
        <tr>
            <th>{{$r->created_at}}</th>
            <th>{{$r->getName()}}</th>
            <th>{{ intval($r->value)}} {{$r->getUnit()}}</th>
            <th>{{$r->modified_at}}</th>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="{{url('record/create')}}">新增</a>
@endsection
