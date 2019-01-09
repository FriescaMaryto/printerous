@extends('layout.admin')



@section('content')

<script>
      function open_modal(name) {
          $.get(name, function(data) {
              $('#content-modal-profile').html(data);
          });
      }
</script>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" id="content-modal-profile">

  </div>
</div>

<div class="container-fluid">

<h2><center> Organization </center></h2><br>

        <form class="form-horizontal" action="{{ URL::to('/admin/add') }}" method="post" enctype="multipart/form-data">

          <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
          <!-- Token harus dimasukkan di setiap form -->

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Organization Name</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Organization Name" name="name_org"/>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Phone" name="phone_org">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" Placeholder="Email" name="email_org">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Website</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" Placeholder="Website" name="web_org">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-10">
              <input type="file" class="ed" name="logo_org">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>


            </div>



    <style media="screen">

        table {
            float:left;
        }

        .c_name_org" {
            width:15%;
        }
        .c_phone_org" {
            width:10%;
        }
        .c_email_org" {
            width:15%;
        }
        .c_web_org" {
            width:15%;
        }
        .c_logo_org" {
            width:15%;
        }
        .c_aksi" {
            width:10%;
        }
        .c_aksi" {
            width:10%;
        }
    </style>
<br>

</br>
    <div class="container-fluid">
      <table border="1" class="table table-striped">
        <tr>
          <th class="c_name_org">
            Organization Name
          </th>
          <th class="c_phone_org">
            Phone
          </th>
          <th class="c_email_org">
            Email
          </th>
          <th class="c_web_org">
            Website
          </th>
          <th class="c_logo_org">
            Logo
          </th>
          <th class="c_aksi">
            Edit
          </th>
          <th class="c_aksi">
            Delete
          </th>
          <th class="c_aksi">
            Detail
          </th>
        </tr>

        @foreach($table as $b)
          <tr>
            <td class="c_name_org">
              {{ $b->name_org }}
            </td>
            <td class="c_phone_org">
              {{ $b->phone_org }}
            </td>
            <td class="c_email_org">
              {{ $b->email_org }}
            </td>
            <td class="c_web_org">
              {{ $b->web_org }}
            </td>
            <td class="c_logo_org">
              <img src="{{ url('/img/'.$b->logo_org) }}" alt="140x140" class="img-thumbnail" width="140px;" height="140px;"/>
            </td>
            <td class="c_aksi">
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="open_modal('{{ URL::to('/update/modals?id_org=' . $b->id_org ) }}')" href="">Ubah</a>
            </td>
            <td class="c_aksi">
              <a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ URL::to('admin/delete?id_org=' . $b->id_org) }}">Hapus</a>
            </td>
            <td class="c_aksi">
              <a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ URL::to('admin/delete?id_org=' . $b->id_org) }}">Detail</a>
            </td>
          </tr>
        @endforeach

      </table>

    </div>

@stop
