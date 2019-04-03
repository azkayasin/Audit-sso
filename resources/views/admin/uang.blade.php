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
                {{$judul}}
                <?php
                foreach($judul as $judul) {
                  $judul = array ("$judul->id"=>"$judul->detail");
                }
                ?>
                <?php print_r($judul);
                echo '<pre>'; print_r($judul); echo '</pre>';
                var_dump($judul);
                echo json_encode($judul);?><br>
                <h3 class="box-title"><strong>Satuan biaya uang makan pegawai tetap</strong></h3>    
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Detail</th>
                      <th>Satuan</th>
                      <th>bruto</th>
                      <th>Parent</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data16 as $data)
                    <tr>
                      <td>{{ $data->id}}</td>
                      <td>{{ $data->detail}}</td>
                      <td>{{ $data->satuan}}</td>
                      <td>{{ $data->bruto}}</td>
                      <td>{{ $data->parent}}</td>
                    </tr>
                    @endforeach
                  </tbody>
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
      

      <!-- tabel kedua -->
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
             <h3 class="box-title"><strong>satuan biaya lembur</strong></h3> 
           </div>
           <!-- /.box-header -->
           <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>no</th>
                  <th>Detail</th>
                  <th>Satuan</th>
                  <th>bruto</th>
                  <th>Parent</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data17 as $data17)
                <tr>
                  <td>{{$data17->id}}</td>
                  <td>{{$data17->detail}}</td>
                  <td>{{$data17->satuan}}</td>
                  <td>{{$data17->bruto}}</td>
                  <td>{{$data17->parent}}</td>
                </tr>
                @endforeach
              </tbody>
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
  <!-- akhir tabel kedua -->

  <!-- tabel ketiga -->
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
         <h3 class="box-title"><strong>Satuan biaya konsumsi penyelenggaraan rapat atau pertemuan lain</strong></h3> <br>
         <h5>Rapat Koordinasi/ Workshop/Seminar/FGD/ Kegiatan Sejenis</h5> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>no</th>
              <th>Detail</th>
              <th>Satuan</th>
              <th>bruto</th>
              <th>Parent</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data19 as $data19)
            <tr>
              <td>{{$data19->id}}</td>
              <td>{{$data19->detail}}</td>
              <td>{{$data19->satuan}}</td>
              <td>{{$data19->bruto}}</td>
              <td>{{$data19->parent}}</td>
            </tr>
            @endforeach
          </tbody>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    <!-- akhir tabel ketiga -->

    <!-- tabel keempat -->
    <div class="box-header">
      <h5>Rapat/Kegiatan  Mengundang Pejabat Tingkat   Menteri/Eselon I/ Setara</h5> 
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example4" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>no</th>
            <th>Detail</th>
            <th>Satuan</th>
            <th>bruto</th>
            <th>Parent</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data20 as $data20)
          <tr>
            <td>{{$data20->id}}</td>
            <td>{{$data20->detail}}</td>
            <td>{{$data20->satuan}}</td>
            <td>{{$data20->bruto}}</td>
            <td>{{$data20->parent}}</td>
          </tr>
          @endforeach
        </tbody>
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
<!-- akhir tabel keempat -->


</section>
<!-- /.content -->
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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
  })
</script>
</body>
</html>
