<!DOCTYPE html>
<html>
<head>
  @include('admin.template.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.template.header')

    <!-- Left side column. contains the logo and sidebar -->
   {{--  @include('admin.template.sidebar-left') --}}

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
            <!-- /.box-header -->
            <?php
            $awal = 2019;
            $no = 1;
            $i =1;
            $konstanta = 1;
            ?>
            <div class="box-body">
              @if(Session::has('message'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ Session::get('message') }}</strong>
              </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>no</th>
                  <th>Laporan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @while ($awal <= $tahun)
                <tr>
                  <?php

                  echo "
                  <td>$no</td>
                  <td>Triwulan $i $tahun </td>"; ?>
                  <td><a href="{{ route('downloadtriwulan', ['tahun' => $awal, 'sesi' => $i]) }}"><button>download</button> </a></td>
                  <?php 
                  $no++;
                  $i++;
                  if ($awal == $tahun)
                  {
                    if ($konstanta+3 >= $bulan)
                      break;
                    else
                      $konstanta = $konstanta +2;

                  }
                  if ($i > 4)
                  {
                    $i = 1;
                    $awal ++;
                  }
                  ?>
                </tr>
                @endwhile
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
