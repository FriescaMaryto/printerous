<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-md">
		<div class="modal-content">


  <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="gridSystemModalLabel">Update Profile</h4>


  		<form action="{{ URL::to('organization/profile/update') }}" method="post" enctype="multipart/form-data">


          <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

          <input type="hidden" name="id_org" id="id_org" value="{{ $organization->id_org }}">
          <br></br>

          <div class="form-group">
            <label for="Organization name">Organization Name</label>
            <input type="text"  class="form-control" name="name_org_update" id="name_org_update" value="{{ $organization->name_org }}"/>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone_org_update" name="phone_org_update" value="{{ $organization->phone_org }}">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email_org_update" name="email_org_update" value="{{ $organization->email_org }}">
          </div>

		  <div class="form-group">
                  <label for="exampleInputEmail1">Website</label>
                  <input type="text" id="web_org_update" name="web_org_update" value="{{ $organization->web_org }}" class="form-control" >
                </div>

		  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <div class="form-group">
                          <div class="row" style="margin-left:10px;">
                             <div class="col-sm-2">
                                 <img src="{{ url('/img/'.$organization->logo_org) }}" alt="140x140" class="img-thumbnail" width="140px;" height="140px;"/>
                            </div>
                          </div>
                     </div>
                    <input type="file" name="logo_org_update" value="{{ $organization->logo_org }}"  class="ed" >
                  </div>


      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" value="Update">Ubah</button>
      </div>


  </form>
  </div>

</div>
</div>
</div>
