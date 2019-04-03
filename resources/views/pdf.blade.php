<:DOCTYPE html>
<html>
<head>
    <title>produk PDF </title>
    <link href=" {{ asset ('public bootstrap/css/bootstrap.min.css') }} "rel="stylesheet">
</head>
<body>
<div class="panel panel - default">
   <div class="panel-heading">
        <h3=align="center">Daftar  Produk </h3>
</div>
<div class="box-body">
  {{-- @foreach ($kda as $kda) --}}
  <ul>
    <li>{{$kda->id_kda}}</li>
    <li>{{$kda->nama}}</li>
    <li>{{$kda->tanggal}}</li>
  </ul>
  {{-- @endforeach --}}
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Kwitansi</th>
                      <th>Nominal</th>
                      <th>keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($temuan as $data)
                    <tr>
                      <td>{{ $data->id}}</td>
                      <td>{{ $data->kwitansi}}</td>
                      <td>{{ $data->nominal}}</td>
                      <td>{{ $data->keterangan}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </tfoot>
              </table>
            </div>
</div>
</body>
</html>