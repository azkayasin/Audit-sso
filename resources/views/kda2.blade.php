<!DOCTYPE html>
<html>
<head>
  @include('admin.template.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.template.header')

    <!-- Left side column. contains the logo and sidebar -->
    {{-- @include('admin.template.sidebar-left') --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
              </div>

                  {{-- <select id="table-filter">
                <option value="">All</option>
                <option value="KDA dengan temuan">KDA dengan temuan</option>
                <option value="KDA tanpa temuan">KDA tanpa temuan</option>
                </select> --}}
              <!-- /.box-header -->
              <div class="box-body">
                <p id="table-filter" style="display:none">
                  Jenis KDA: 
                  <select>
                  <option value="">All</option>
                  <option value="KDA dengan temuan">KDA dengan temuan</option>
                  <option value="KDA tanpa temuan">KDA tanpa temuan</option>
                  </select>
                  </p>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>nama kda</th>
                      <th>Jenis Kda</th>
                      <th>Temuan</th>
                      <th>Edit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kda as $kda)
                    <tr>
                      <td>{{ $kda->id_kda }}</td>
                      <td>{{ $kda->nama}}-{{ $kda->tanggal}}</td>
                      @if ($kda->jenis == 1)
                      <td>KDA tanpa temuan</td>
                      <td>Tidak ada temuan</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="submitUpdate('{{ $kda->id_kda }}')">Edit</button></td>
                      @else
                      <td>KDA dengan temuan</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-temuan" onclick="temuanupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="submitUpdate('{{ $kda->id_kda }}')">Edit</button></td>
                      @endif
{{--                       <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" data-whatever="{{ $kda->id_kda}}">edit
</button></td> --}}
                      <td><a href="{{ url('pdf/'.$kda->id_kda) }}"><button>Download</button></a> </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>no</th>
                      <th>nama kda</th>
                      <th>Jenis Kda</th>
                      <th>Temuan</th>
                      <th>Edit</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                    </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<div class="modal fade" id="modal-temuan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="temuanclose()">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Temuan</h4>
          <div id="test"></div>
        </div>
        <div class="modal-body">
          <form action="{{url('/temuan/update')}}" method="get" id="tambah_kda" enctype="multipart/form-data">
            {{-- <div class="temuan" id="temuan" name="temuan" > --}}
              <div>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kwitansi</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Konfirmasi</th>
                  </tr>
                  <tbody id="temuan">
                  </tbody>
                </thead>
              </table>

            </div>
            {{-- <input type="text" name="id" placeholder="masuk keterangan" class="form-control name_list"/>
            <input type="text" name="name" placeholder="Enter your Name" class="form-control name_list" />
            <input type="text" name="keterangan" placeholder="masuk keterangan" class="form-control name_list"/>
            <input type="text" name="kda_id" placeholder="masuk keterangan" class="form-control name_list"/> --}}

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="temuanclose()" >Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
  <!-- modal temuan end -->


  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit</h4>
            <div id="test"></div>
          </div>
          <div class="modal-body">
            <form action="{{url('/kda/update')}}" method="POST" id="tambah_kda" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" id="id" name="id">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="unit" name="unit" value="{{old('unit')}}" placeholder="Nama unit" required>
                @if ($errors->has('unit'))
                <div class="alert alert-danger">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('unit') }}</div>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" id="jenis" name="jenis" value="{{old('jenis')}}" placeholder="jenis" required>
                  @if ($errors->has('jenis'))
                  <div class="alert alert-danger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('jenis') }}</div>
                    @endif
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="datetimepicker" name="tanggal" value="{{old('tanggal')}}" placeholder="Tanggal" required>
                    @if ($errors->has('tanggal'))
                    <div class="alert alert-danger">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('tanggal') }}</div>
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
          <!-- /.content-wrapper -->
          @include('admin.template.footer')

          <!-- Control Sidebar -->
          @include('admin.template.sidebar-right')
          <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 @include('admin.template.setting')
 <script>
  $(document).ready(function (){
    var table = $('#example1').DataTable({
       dom: 'lr<"table-filter-container">tip',
       initComplete: function(settings){
          var api = new $.fn.dataTable.Api( settings );
          $('.table-filter-container', api.table().container()).append(
             $('#table-filter').detach().show()
          );
          
          $('#table-filter select').on('change', function(){
             table.search(this.value).draw();   
          });       
       }
    });
    
});
</script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
  $(function () {
    $('#datetimepicker1').datepicker({
      format: 'yyyy-mm-dd',
      startView: 2
    });
  });
  $(function () {
    $('#datetimepicker').datepicker({
      format: 'yyyy-mm-dd',
      startView: 2
    });
  });
</script>
<script>
  $(document).ready(function(){

    submitForm = function(){
      $('#tambah_kda').submit();
    }
    submitUpdate = function(id){
      $.ajax({
        url: '/kda/data',
        type: 'POST',
        data: {
          '_token': "{{ csrf_token() }}",
          'id' : id
        },
        error: function() {
          console.log('Error');
        },
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#id').val(data.id_kda);
          $('#unit').val(data.unit);
          $('#jenis').val(data.jenis);
          $('#datetimepicker').val(data.tanggal);
        }
      });
    }
    
    temuanupdate = function(id){
      $.ajax({
        url: '/kda/temuan',
        type: 'POST',
        data: {
          '_token': "{{ csrf_token() }}",
          'id' : id
        },
        error: function() {
          console.log('Error');
        },
        dataType: 'json',
        success: function(data1) {

          console.log(data1);
          var jumlah = data1.length;
          console.log(jumlah);
          var temuansemua = '';

          //var data1 = $.parseJSON(data1);
          for (var i = 0; i < jumlah; i++)
          {
            console.log (data1[i]['kwitansi']);
            console.log (data1[i]['keterangan']);
            var kwitansi = data1[i]['kwitansi'];
            var nominal = data1[i]['nominal'];
            var keterangan = data1[i]['keterangan'];
            var status = data1[i]['status'];
            var id = data1[i]['id'];

            // if (status) {
            //   temuansemua = 
            // `<input type="text" name="kwitansi[${i}]" placeholder="Nomor kwitansi" class="form-control name_list" value= "${kwitansi}" />
            // <input type="text" name="nominal[${i}]" placeholder="masukkan nominal" class="form-control name_list" value= "${nominal}" />
            // <input type="text" name="keterangan[${i}]" placeholder="masukkan keterangan" class="form-control name_list" value= "${keterangan}" /> `;
            //  $("#temuan").append(temuansemua);
            // }
            // else
            // {
            //   temuansemua= 
            //   `<input type="text" name="kwitansi[${i}]" placeholder="Nomor kwitansi" class="form-control name_list" value= "${kwitansi}" />
            // <input type="text" name="nominal[${i}]" placeholder="masukkan nominal" class="form-control name_list" value= "${nominal}" />
            // <input type="text" name="keterangan[${i}]" placeholder="masukkan keterangan" class="form-control name_list" value= "${keterangan}" /> 
            //   <input type="checkbox" name="checkbox[]" data-id="${id}" value="${id}" id="checkbox[]">`;
            //   $("#temuan").append(temuansemua);
            // }

            if (status) {
              temuansemua = 
            `<tr><td name="kwitansi[${i}]">${kwitansi}</td><td name="nominal[${i}]">${nominal}</td><td name="keterangan[${i}]">${keterangan}</td><td>Telah dikonfirmasi</td></tr>`;
             $("#temuan").append(temuansemua);
            }
            else
            {
              temuansemua= 
              `<tr><td name="kwitansi[${i}]">${kwitansi}</td><td name="nominal[${i}]">${nominal}</td><td name="keterangan[${i}]">${keterangan}</td><td><input type="checkbox" name="checkbox[]" data-id="${id}" value="${id}" id="checkbox[]"></td></tr>`;
              $("#temuan").append(temuansemua);
            }
          }
        }
      });
    }

    temuanclose = function(){
      $("#temuan").empty();
    }

  });     
</script>

</body>
</html>
