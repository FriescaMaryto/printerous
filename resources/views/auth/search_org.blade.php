@extends('layout.organization')

@section('content')

	<head>
		<title>Pencarian Data Organization </title>
	</head>
	<body>
	<div class="container">
	<h3>Pencarian Data Organization</h3>
	<hr>

				<form action="{{ url()}}/cari_org" action="GET">
        <div class="form-group">
					<label for="cari">Nama </label>
					<input type="text" class="form-control" id="cari_org" name="cari_org" placeholder="cari">
        </div>
        <div class="form-group">
					<input class="btn btn-primary" type="submit" value="Tampilkan">
					<br>
					</br>
		     </div>
			 </form>
        	<h3>Hasil Pencarian</h3>


        		@if (count($name) > 0)
                <style media="screen">

                    table {
                        float:left;
                    }

                    .c_idorg" {
                        width:10%;
                    }
                    .c_name" {
                        width:10%;
                    }
                    .c_phone" {
                        width:15%;
                    }

                    .c_email" {
                        width:15%;
                    }
                    .c_web" {
                        width:10%;
                    }
                    .c_logo"{
                        width:10%;
                    }
                </style>


                <div class="container-fluid">
                  <table border="1" class="table"  id="table_pencarian">
                    <tr>
	                    <th class="c_idorg">
	                    Organization ID
	                    </th>
	                    <th class="c_name">
	                    Organization Name
	                    </th>
	                    <th class="c_phone">
	                    Phone
	                    </th>
	                    <th class="c_email">
	                    Email
	                    </th>
											<th class="c_web">
	                    Website
	                    </th>
											<th class="c_logo">
	                    Logo
	                    </th>
                    </tr>

                  @foreach ($name as $ddv)
                        <tr>
                            <td class="c_idorg">
                              {{ $ddv->id_org }}
                            </td>
                            <td class="c_name">
                              {{ $ddv->name_org }}
                            </td>
                            <td class="c_phone">
                              {{ $ddv->phone_org }}
                            </td>
                            <td class="c_email">
                              {{ $ddv->email_org }}
                            </td>
														<td class="c_web">
                              {{ $ddv->web_org }}
                            </td>
                            <td class="c_logo">
															<img src="{{ url('/img/'.$ddv->logo_org) }}" alt="140x140" class="img-thumbnail" width="140px;" height="140px;"/>
														</td>
                        </tr>
                      @endforeach
                  </table>

                  @else
                  Data tidak ditemukan.
                  @endif



		</div>

	</body>
@endsection
