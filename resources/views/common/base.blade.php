<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('/components/bootstrap-sweetalert/lib/sweet-alert.css')}}">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/app.css.map')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('head')
        <title>健康記錄</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">林文義健康記錄</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="{{$active['index']}}"><a href="{{url('/record')}}">今日總覽<span class="sr-only">(current)</span></a></li>
                <li class="{{$active['create']}}"><a href="{{url('/record/create')}}">新增記錄</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('/components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>
        @yield('bottom-script')
    </body>
</html>
