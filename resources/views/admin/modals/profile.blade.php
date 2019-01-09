<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="gridSystemModalLabel">Update Profile</h4>


      <form action="{{ URL::to('/update') }}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

          <input type="hidden" name="id_org" value="{{ $data->id_org }}">
          <br></br>

          <div class="form-group">
              <label for="exampleInputEmail1">Organization Name</label>
              <input type="text" name="editname_org" value="{{ $data->name_org }}" class="form-control" >
            </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="text" name="editphone_org" value="{{ $data->phone_org }}" class="form-control" >
            </div>

          <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text"  name="editemail_org" value="{{ $data->email_org }}" class="form-control" >
              </div>

          <div class="form-group">
                  <label for="exampleInputEmail1">Website</label>
                  <input type="text" name="editweb_org" value="{{ $data->web_org }}" class="form-control" >
                </div>

          <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <div class="form-group">
                          <div class="row" style="margin-left:10px;">
                             <div class="col-sm-2">
                                 <img src="{{ url('/img/'.$data->logo_org) }}" alt="140x140" class="img-thumbnail" width="140px;" height="140px;"/>
                            </div>
                          </div>
                     </div>
                    <input type="file" name="editlogo_org" value="{{ $data->logo_org }}"  class="ed" >
                  </div>


          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" value="Update">Ubah</button>
          </div>
      </form>
</div>
