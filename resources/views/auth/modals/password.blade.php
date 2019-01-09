<div class="modal fade" id="modal-password" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="gridSystemModalLabel">Update Password</h4>


<form action="{{ URL::to('/password/update') }}" method="post">


  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
  @foreach($data as $data)
  <input type="hidden" name="id" value="{{ $data->id }}">
<br></br>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> Username </label>
    <div class="col-sm-10">
    <input id="login-username" type="text" class="form-control" name="username" value="{{ $data->username }}" >
    </div>
  </div>

  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label"> Password Baru </label>
        <div class="col-sm-10">
          <input id="login-password" type="text" class="form-control" name="pwd" >
        </div>
  </div>
  @endforeach

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" class="btn btn-primary" value="Update">Ubah</button>
</div>


</form>
</div>

</div>
</div>
</div>
