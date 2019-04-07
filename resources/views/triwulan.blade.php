@extends('admin.template.template')
@section('judul')
  Laporan KDA
@endsection
@section('dimana')
  <li>Laporan KDA</li>
  <li class="active">Laporan KDA</li>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Laporan KDA</h3>
        </div>
          <div class="box-body">
            <?php
            $awal = 2019;
            $no = 1;
            $i =1;
            $konstanta = 1;
            ?>
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
    </div>
  </div>
</div>
@endsection

@section('addjs')
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
@endsection