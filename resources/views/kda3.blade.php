<!DOCTYPE html>
<html>
<head>
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
              <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                  <thead>
                      <tr>
                          <th>Target</th>
                          <th>Search text</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr id="filter_col1" data-column="1">
                          <td>Unit</td>
                          <td align="center"><select class="column_filter" id="col1_filter">
                              <option></option>
                              @foreach($unit as $data => $value)
                               <option value="{{$value->nama}}">{{$value->nama}}</option>
                               @endforeach
                            </select></td>
                      </tr>
                      <tr id="filter_col2" data-column="2">
                          <td>Jenis</td>
                          <td align="center"><select id="col2_filter" class="column_filter">
                              <option value="">All</option>
                              <option>KDA tanpa temuan</option>
                              <option>KDA dengan temuan</option>
                              <option>KDA Unaudited</option>
                              <option>KDA tanpa pengajuan UMK</option>
                              </select></td>
                      </tr>
                  </tbody>
              </table>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>nama kda</th>
                      <th>Jenis Kda</th>
                      <th>Data Pelengkap</th>
                      <th>Edit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @foreach($kda as $key => $kda)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $kda->nama}}-{{$kda->bulan_audit}}</td>
                      @if ($kda->jenis == 1)
                      <td>KDA tanpa temuan</td>
                      <td>Tidak ada temuan</td>
                      @elseif ($kda->jenis == 2)
                      <td>KDA dengan temuan</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-temuan" onclick="temuanupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @elseif ($kda->jenis == 3)
                      <td>KDA Unaudited</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-keterangan" onclick="keteranganupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @else
                      <td>KDA tanpa pengajuan UMK</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-keterangan" onclick="keteranganupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @endif
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="submitUpdate('{{ $kda->id_kda }}')">Edit</button></td>
                      <td><a href="{{ url('pdf/'.$kda->id_kda) }}"><button>Download</button></a> </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>no</th>
                      <th>nama kda</th>
                      <th>Jenis Kda</th>
                      <th>Data Pelengkap</th>
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


<div class="modal fade" id="modal-keterangan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Keterangan</h4>
          <div id="test"></div>
        </div>
        <div class="modal-body">
          <form action="{{url('/keterangan/update')}}" method="POST" id="tambah_keterangan" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" id="id" name="id">
            <div class="form-group has-feedback">
              <label class="control-label">Kondisi</label>
              <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi">
            </div>
            <div class="form-group has-feedback">
              <label class="control-label">Kesimpulan</label>
              <input type="text" class="form-control" id="kesimpulan" name="kesimpulan" value="{{old('Kesimpulan')}}" placeholder="Kesimpulan">
            </div>
            <div class="form-group has-feedback">
              <label class="control-label">Saran</label>
              <input type="text" class="form-control" id="saran" name="saran" value="{{old('saran')}}" placeholder="saran">
            </div>
            <div class="form-group has-feedback">
              <label class="control-label">Rekomendasi</label>
              <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" value="{{old('rekomendasi')}}" placeholder="rekomendasi">
            </div>
            <div class="form-group has-feedback">
              <label class="control-label">Tanggapan</label>
              <input type="text" class="form-control" id="tanggapan" name="tanggapan" value="{{old('tanggapan')}}" placeholder="tanggapan">
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
              <input type="text" id="idkda" name="idkda">
              <div class="form-group has-feedback">
                <label class="control-label">Nama Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" value="{{old('unit')}}" placeholder="Nama unit" required>
                @if ($errors->has('unit'))
                <div class="alert alert-danger">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('unit') }}</div>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label">Jenis Kda</label>
                  <input type="text" class="form-control" id="jenis" name="jenis" value="{{old('jenis')}}" placeholder="jenis" required>
                  @if ($errors->has('jenis'))
                  <div class="alert alert-danger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('jenis') }}</div>
                    @endif
                  </div>
                  <div class="form-group has-feedback">
                    <label class="control-label">Tanggal Dibuat</label>
                    <input type="text" class="form-control" id="datetimepicker" name="bulan_audit" value="{{old('bulan_audit')}}" placeholder="Tanggal" required>
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
  function filterColumn ( i ) {
      $('#example1').DataTable().column( i ).search(
          $('#col'+i+'_filter').val()
      ).draw();
  }
  $(document).ready(function (){
    //var table = $('#example1').DataTable();
    $('#example1').DataTable();

    $('select.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
    $('select2').select2(
    {
      placeholder: "Pilih Unit",
      allowClear: true
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
          $('#idkda').val(data.id_kda);
          $('#unit').val(data.unit);
          $('#jenis').val(data.jenis);
          $('#datetimepicker').val(data.bulan_audit);
        }
      });
    }

    keteranganupdate = function(id){
      $.ajax({
        url: '/kda/keterangan',
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
          $('#id').val(data.id);
          $('#kondisi').val(data.kondisi);
          $('#kesimpulan').val(data.kesimpulan);
          $('#saran').val(data.saran);
          $('#rekomendasi').val(data.rekomendasi);
          $('#tanggapan').val(data.tanggapan);

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
{{-- <script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script> --}}
<script src="adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
</body>
</html>
