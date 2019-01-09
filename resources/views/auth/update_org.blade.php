@extends('layout.organization')



@section('content')

<html>
  <head>
    <title></title>
  </head>
  <body>
    <form action="{{ URL::to('profile/view_update') }}" method="post">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
<input type="hidden" name="id_org" value="{{ $sesinfo['id_org'] }}">
      @foreach($data as $b)

        Nama: <input type="text" name="name_org" value="{{ $b->name_org }}" />

        Pangkat: <input type="text" name="phone_org" value="{{ $b->phone_org }}" />
        Golongan: <input type="text" name="email_org" value="{{ $b->email_org }}" />
        Pekerjaan: <input type="text" name="web_org" value="{{ $b->web_org }}" />
        Unit: <input type="text" name="logo_org" value="{{ $b->logo_org }}" />
        @endforeach

        @foreach($logins as $logins)
        <div class="panel-heading">
                <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon"> Username </i></span>
                      <input id="login-username" type="text" class="form-control" name="username" value="{{ $logins->username }}">
                  </div>

                  <div style="margin-bottom: 25px" class="input-group">
                      <span class="input-group-addon"> Password </i></span>
                      <input id="login-password" type="password" class="form-control" name="pwd"  value="{{ $logins->pwd }}">
                  </div>
              </div>
      <input type="submit" name="name" value="Update">
    </form>
    @endforeach
  </body>
</html>

@stop
