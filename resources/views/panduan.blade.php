<!DOCTYPE html>
<html>
<head>
  @include('admin.template.head')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />  
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    <style type="text/css">
      td.details-control {
    background: url('../details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../details_close.png') no-repeat center center;
}
    </style>
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
              </div>
             <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Id_kda</th>
                <th>Nama Unit</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Id_kda</th>
                <th>Nama Unit</th>
                <th>Tanggal</th>
            </tr>
        </tfoot>
    </table>
            </div>
          </div>
        </div>
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


<script type="text/javascript">
  function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Kwitansi:</td>'+
            '<td>'+d.temuan.kwitansi+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Nominal:</td>'+
            '<td>'+d.temuan.nominal+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Keterangan:</td>'+
            '<td>'+d.temuan.keterangan+'</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
         "ajax": {
            "url":  "/panduan/data",
            "dataSrc": ""
        },
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "id_kda" },
            { "data": "nama" },
            { "data": "tanggal" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example1').DataTable( {
        "ajax": {
            "url":  "/panduan/data",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_kda" },
            { "data": "unit" },
            { "data": "tanggal" }
        ]
    } );
} );
</script>
</body>
</html>
