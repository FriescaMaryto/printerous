<head>
	<link rel="stylesheet" href="{{ URL::to('/assets/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
	<script src="{{ URL::to('/assets/js/jquery.js') }}"></script>
	<script src="{{ URL::to('/assets/js/bootstrap.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ URL::to('favicon.png') }}">
    <title>Printerous Code Challenge - Organization</title>
</head>
@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
	<div class="container">
        <div id="loginbox" style="margin-top:15%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" action="{{ URL::to('/do_login')}}" method="post">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="pswd" placeholder="Password">
                                    </div>



                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" class="btn btn-success" value="Login">
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
        </div>
