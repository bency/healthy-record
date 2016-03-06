@extends('common.base')
@section('content')
<form class="form-horizontal" method="post" action="/record">
    <div class="form-group">
        <label class="col-xs-2 control-label" for="">小便</label>
        <div class="col-xs-8">
            <input id="piss" type="number" class="form-control" name="piss" pattern="\d*" placeholder="小便容量">
        </div>
        <button type="button" class="btn btn-default col-xs-2" data-function="submit" data-type="piss">送出</button>
    </div>
</form>
<form class="form-horizontal" method="post" action="/record">
    <div class="form-group">
        <label class="col-xs-2 control-label" for="">喝水</label>
        <div class="col-xs-8">
            <input id="water" type="number" class="form-control" name="water" pattern="\d*" placeholder="喝水容量">
        </div>
        <button type="button" class="btn btn-default col-xs-2" data-function="submit" data-type="water">送出</button>
    </div>
</form>
<form class="form-horizontal" method="post" action="/record">
    <div class="form-group">
        <label class="col-xs-2 control-label" for="">進食</label>
        <div class="col-xs-4">
            <input id="before-eat" type="number" class="form-control" name="before-eat" pattern="\d*" placeholder="進食前總重">
        </div>
        <div class="col-xs-4">
            <input id="after-eat" type="number" class="form-control" name="after-eat" pattern="\d*" placeholder="進食後總重">
        </div>
        <button type="button" class="btn btn-default col-xs-2" data-function="submit" data-type="food">送出</button>
    </div>
</form>
<form class="form-horizontal" method="post" action="/record">
    <div class="form-group">
        <div class="col-xs-12">
            <input id="pupu" type="hidden" value="1">
            <button type="button" class="btn btn-default btn-block" data-function="submit" data-type="pupu">記錄大便次數</button>
        </div>
    </div>
</form>
@endsection
@section('head')
<link rel="stylesheet" href="{{asset('/components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
@endsection
@section('bottom-script')
<script src="{{asset('/components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('/js/record.min.js')}}"></script>
@endsection
