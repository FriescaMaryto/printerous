@extends('layout.organization')

@section('content')

<script>
        function open_modal(name) {
            $.get(name, function(data) {
                $('#content-modal-data').html(data);
            });
            $.get(name, function(data) {
                $('#content-modal-password').html(data);
            });
        }
</script>



<div class="modal fade bs-example-modal-lg" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" id="content-modal-data">

  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" id="content-modal-password">

  </div>
</div>


<form class="form-horizontal" action="{{ URL::to('/profile/update') }}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
  <!-- Token harus dimasukkan di setiap form -->

  <div class="container" style="margin-bottom:20px;">
      <center> <h2>Profil</h2> </center>
  </div>


  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Organization Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" value="{{ $organization->name_org }}" disabled="" name="name_org"/>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $organization->phone_org }}" disabled="" name="phone_org">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $organization->email_org }}" disabled="" name="email_org">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $organization->web_org }}" disabled="" name="web_org">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" value="{{ $organization->logo_org }}" disabled="" name="web_org"> -->
      <img src="{{ url('/img/'.$organization->logo_org) }}" alt="140x140" class="img-thumbnail" width="140px;" height="140px;"/>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> Username </label>
    <div class="col-sm-10">
    <input id="login-username" type="text" class="form-control" name="username" value="{{ $logins->username }}" disabled="">
    </div>
 </div>

  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label"> Password </label>
        <div class="col-sm-10">
          <input id="login-password" type="password" class="form-control" name="pwd"  value="{{ $logins->password }}" disabled="">
        </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-data" onclick="open_modal('{{ URL::to('organization/profile/modals/update?id_org=' . $sesinfo['id_org'] ) }}')" >Ubah</a>
     <!-- <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_profil" onclick="modal_profil('{{ $organization->id_org }}',
                                                          '{{ $organization->name_org }}',
                                                          '{{ $organization->phone_org }}',
                                                          '{{ $organization->email_org }}',
                                                          '{{ $organization->web_org }}',
                                                          '{{ $organization->logo_org }}',
                                                          '{{ $organization->id_user }}')" >Ubah</a> -->

     <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-password" onclick="open_modal('{{ URL::to('organization/modals/update?id_org' . $sesinfo['id_org'] ) }}')" >Ubah Password</a>
    </div>
  </div>

</form>
<!-- <script type="text/javascript">

  function modal_profil(id_org, name_org, phone_org, email_org, web_org, logo_org, id_user) {
    $('#id_org_update').val(id_org);
    $('#name_org_update').val(name_org);
    $('#phone_org_update').val(phone_org);
    $('#email_org_update').val(email_org);
	$('#web_org_update').val(web_org);
	$('#logo_org_update').val(logo_org);
  }


</script> -->

@endsection
<!--
@section('modal')
@include('auth.modals.profile')
@endsection -->
