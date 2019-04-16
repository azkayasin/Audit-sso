@extends('admin.template.template')
@section('judul')
  LIST KDA
@endsection
@section('dimana')
  <li>KDA</li>
  <li class="active">List KDA</li>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title">List KDA</h3>
          <h3>Filter</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Unit</label>
                  <div class="col-sm-10">
                    <select id="col1_filter" class="column_filter form-control" data-column="1">
                      <option value="">Semua</option>
                      @foreach($unit as $data => $value)
                       <option value="{{$value->nama}}">{{$value->nama}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <select id="col2_filter" class="column_filter form-control" data-column="2">
                      <option value="">Semua</option>
                      <option>Januari</option><option>Februari</option><option>Maret</option>
                      <option>April</option><option>Mei</option><option>Juni</option>
                      <option>Juli</option><option>Agustus</option><option>September</option>
                      <option>Oktober</option><option>November</option><option>Desember</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select id="col3_filter" class="column_filter form-control" data-column="3">
                      <option value="">Semua</option>
                      <option>2018</option><option>2019</option><option>2020</option>
                      <option>2021</option><option>2022</option><option>2023</option>
                      <option>2024</option><option>2025</option><option>2026</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis</label>
                  <div class="col-sm-10">
                    <select id="col4_filter" class="column_filter form-control" data-column="4">
                      <option value="">Semua</option>
                      <option>KDA tanpa temuan</option>
                      <option>KDA dengan temuan</option>
                      <option>KDA Unaudited</option>
                      <option>KDA tanpa pengajuan UMK</option>
                      </select>
                  </div>
                </div>
        </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Unit</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Jenis Kda</th>
                      <th>Data Pelengkap</th>
                      <th>Lihat Data</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @foreach($kda as $key => $kda)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{ $kda->nama}}</td>
                      <td>{{ $kda->bulan}}</td>
                      <td>{{ $kda->tahun}}</td>
                      @if ($kda->jenis == 1)
                      <td>KDA tanpa temuan</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-pelengkap" onclick="kelengkapanupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @elseif ($kda->jenis == 2)
                      <td>KDA dengan temuan</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-pelengkap" onclick="kelengkapanupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @elseif ($kda->jenis == 3)
                      <td>KDA Unaudited</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-keterangan" onclick="keteranganupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @else
                      <td>KDA tanpa pengajuan UMK</td>
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-keterangan" onclick="keteranganupdate('{{ $kda->id_kda }}')">lihat</button></td>
                      @endif
                      <td><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="submitUpdate('{{ $kda->id_kda }}')">Lihat</button></td>
                      <td><a href="{{ url('pdf/'.$kda->id_kda) }}"><button>Download</button></a> </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Unit</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Jenis Kda</th>
                      <th>Data Pelengkap</th>
                      <th>Lihat Data</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                    </table>    
          </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-pelengkap">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="temuanclose()">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Kelengkapan Data</h4>
          <div id="test"></div>
      </div>
        <div class="modal-body">
          <form action="{{url('kda/kelengkapan/update')}}" method="get" id="update_kelengkapan" enctype="multipart/form-data">
            <div>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kelengkapan</th>
                    <th>Ada / Tidak Ada</th>
                    <th>jumlah</th>
                    <th>Nominal</th>
                  </tr>
                  <tbody id="kelengkapan">
                  </tbody>
                </thead>
              </table>
            </div>
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
</div><!-- modal temuan end -->

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
            <input type="hidden" id="idkda" name="idkda">
            <div class="form-group has-feedback">
              <label class="control-label">Nama Unit</label>
              <input type="text" class="form-control" id="unit" name="unit" value="{{old('unit')}}" placeholder="Nama unit" readonly="">
              @if ($errors->has('unit'))
              <div class="alert alert-danger">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('unit') }}</div>
                @endif
              </div>
              <div class="form-group has-feedback">
                <label class="control-label">Jenis Kda</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{old('jenis')}}" placeholder="jenis" readonly="">
                @if ($errors->has('jenis'))
                <div class="alert alert-danger">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('jenis') }}</div>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <label class="control-label">Tanggal Dibuat</label>
                  <input type="text" class="form-control" id="datetimepicker" name="bulan_audit" value="{{old('bulan_audit')}}" placeholder="Tanggal" readonly="">
                  @if ($errors->has('tanggal'))
                  <div class="alert alert-danger">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('tanggal') }}</div>
                    @endif
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                  </div>
            </form>
        </div>
    </div>
  </div><!-- /.modal -->
</div>

@endsection

@section('addjs')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('#col1_filter').select2(
    {
      placeholder: "Semua",
      allowClear: true
    })
  })
</script>
<script>
  function filterColumn ( i ) {
      $('#example1').DataTable().column( i ).search(
          $('#col'+i+'_filter').val()
      ).draw();
      console.log($('#col'+i+'_filter').val())
  }
  $(document).ready(function (){
    //var table = $('#example1').DataTable();
    $('#example1').DataTable();

    $('select.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).attr('data-column') );
    } );
    $('#col1_filter').on( 'change', function () {
        filterColumn( $(this).attr('data-column') );
    } );
    $('select2').select2(
    {
      placeholder: "Pilih Unit",
      allowClear: true
    });
  
});
</script>
<script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass: 'iradio_square-blue',
  //     increaseArea: '20%'
  //   });
  // });
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
          $('#unit').val(data.nama);
          if (data.jenis == 1) $('#jenis').val("KDA Tanpa Temuan");
          else if(data.jenis == 2) $('#jenis').val("KDA Dengan Temuan");
          else if(data.jenis == 3) $('#jenis').val("KDA Unaudited");
          else $('#jenis').val("KDA Tanpa Pengajuan UMK");
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
    
    kelengkapanupdate = function(id){
      $.ajax({
        url: '/kda/kelengkapan',
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
          var ketsemua = '';

          //var data1 = $.parseJSON(data1);
          for (var i = 0; i < data1.length; i++)
          {
            var kelengkapan = data1[i]['kelengkapan'];
            var nominal = data1[i]['nominal'];
            var kesediaan = data1[i]['kesediaan'];
            var jumlah = data1[i]['jumlah'];
            var id = data1[i]['id'];
            if (nominal == null || jumlah == null || kesediaan == null) {
             ketsemua = `<tr><td> <input type="hidden" name="id[${i}]" value="${id}"><input type="text" name="kelengkapan[${i}]" value="${kelengkapan}"></td>
             <td><select name="kesediaan[${i}]" id="kesediaan">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
             <td><input type="text" name="jumlah[${i}]" value="" size="10"></td>
             <td><input type="text" name="nominal[${i}]" value=""></tr>`; 
              $("#kelengkapan").append(ketsemua);
            }
            else{
              ketsemua = `<tr><td> <input type="hidden" name="id[${i}]" value="${id}"><input type="text" name="kelengkapan[${i}]" value="${kelengkapan}"></td>
              <td><select name="kesediaan[${i}]" id="kesediaan[${i}]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
             <td><input type="text" name="jumlah[${i}]" value="${jumlah}" size ="10"></td>
             <td><input type="text" name="nominal[${i}]" value="${nominal}"></tr>`;
             $("#kelengkapan").append(ketsemua);
             document.getElementById(`kesediaan[${i}]`).value = kesediaan;
            }
          }
        }
      });
    }

    temuanclose = function(){
      $("#kelengkapan").empty();
    }

  });     
</script>
<script src="adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
  
@endsection