<!DOCTYPE html>
<html>
<head>
  <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  @include('admin.template.head')
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
              <!-- /.box-header -->
              <div class="box-body">
                <h3 class="box-title">Pilih Jenis KDA</h3>
                <select id="pilihkda">
                  <!-- <option value="" disabled selected>Select your option</option> -->
                  <option value="1">kda tanpa Temuan</option>
                  <option value="2">kda dengan Temuan</option>
                  <option value="3">kda Unaudited</option>
                  <option value="4">kda tanpa pengajuan UMK</option>
                </select>
                <input type="button" name="submitpilih" id="submitpilih" class="btn btn-info" value="buat kda" />

                  <div class="form-group" id="kda1">
                    <h2 align="center">FORM KDA TANPA TEMUAN</h2>  
                   <form name="add_kda1" id="add_kda1">  
                    <div class="alert alert-danger print-error-msg" style="display:none">
                      <ul></ul>
                    </div>
                    <!-- <div class="alert alert-success print-success-msg" style="display:none">
                      <ul></ul>
                    </div> -->
                    <div class="form-group">
                      <label>Pilih Unit</label>
                      <select class="form-control select2" name="unit[]">
                        <option></option>
                        @foreach($unit as $data => $value)
                        <option value="{{$value->id_unit}}">{{$value->nama}}</option>
                        @endforeach
                      </select>  
                    </div>
                    <div class="form-group">
                      <label class="control-label">Tanggal</label>
                      <td><input type="date" id="tanggal" name="tanggal[]" placeholder="Pilih tanggal" class="form-control name_list" /></td>
                    </div>
                    <input type="button" name="submitkda1" id="submitkda1" class="btn btn-info" value="Submit" />
                  </form>  
                </div> 


     <div class="form-group" id="kda2">
      <h2 align="center">FORM KDA DENGAN TEMUAN</h2> 
      <form name="add_kda2" id="add_kda2">  
        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
        </div>
<!--         <div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
        </div> -->
        <div class="form-group">
          <label>Pilih Unit</label>
          <select class="form-control select2" name="unit[]">
            <option></option>
            @foreach($unit as $data => $value)
             <option value="{{$value->id_unit}}">{{$value->nama}}</option>
             @endforeach
          </select>  
        </div>
        <div class="form-group">
          <label class="control-label">Tanggal</label>
          <td><input type="date" id="tanggal" name="tanggal[]" placeholder="Pilih tanggal" class="form-control name_list" /></td>  
        </div>
        <div class="table-responsive">
        <div class="box-header">
                <h3 class="box-title">Temuan</h3>
              </div>  
          <table class="table table-bordered" id="dynamic_field">  
            <thead>
                    <tr>
                      <th>Kwitansi</th>
                      <th>Nominal</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
            <tr>
              <td><input type="text" name="kwitansi[]" placeholder="Nomor kwitansi" class="form-control name_list" /></td>  
              <td><input type="text" name="nominal[]" placeholder="masukkan nominal" class="form-control name_list" /></td>  
              <td><input type="text" name="keterangan[]" placeholder="masuk keterangan" class="form-control name_list" /></td>  
              <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
          </table>  
          <input type="button" name="submitkda2" id="submitkda2" class="btn btn-info" value="Submit" />  
        </div>
      </form>  
    </div> 

    
    <div class="form-group" id="kda3">
      <h2 align="center" id="judulform">FORM KDA 3 dan 4</h2>  
     <form name="add_kda3" id="add_kda3">  
      <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
      </div>
      <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
      </div>
      <div class="form-group">
        <label>Pilih Unit</label>
        <select class="form-control select2" name="unit">
          <option></option>
          @foreach($unit as $data => $value)
             <option value="{{$value->id_unit}}">{{$value->nama}}</option>
          @endforeach
        </select>  
      </div>
        <input type="hidden" id="jenis_kda3" name="jenis_kda3" placeholder="Pilih jenis" class="form-control name_list" />
      <div class="form-group">
        <label class="control-label">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" placeholder="Pilih tanggal" class="form-control name_list" />
      </div>
      <div class="form-group">
        <label class="control-label">Kondisi</label>
        <input type="textarea" id="kondisi" name="kondisi" placeholder="Deskrips Kondisi" class="form-control name_list" />
      </div>
      <div class="form-group">
        <label class="control-label">Kesimpulan</label>
        <input type="text" id="kesimpulan" name="kesimpulan" placeholder="Deskripsi Kesimpulan" class="form-control name_list" />
      </div>
      <div class="form-group">
        <label class="control-label">Saran</label>
        <input type="text" id="saran" name="saran" placeholder="Deskripsi Saran" class="form-control name_list" />
      </div>
      <div class="form-group">
        <label class="control-label">Rekomendasi</label>
        <input type="text" id="rekomendasi" name="rekomendasi" placeholder="Deskripsi Rekomendasi" class="form-control name_list" />
      </div>
      <div class="form-group">
        <label class="control-label">Kesimpulan</label>
        <input type="text" id="tanggapan" name="tanggapan" placeholder="Deskripsi Tanggapan" class="form-control name_list" />
      </div>
      <input type="button" name="submitkda3" id="submitkda3" class="btn btn-info" value="Submit" />
    </form>  
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
    //Initialize Select2 Elements
    $('.select2').select2(
    {
      placeholder: "Pilih Unit",
      allowClear: true
    })

  })
</script>

<script type="text/javascript">
  var jenis_kda;
  $("#kda1").hide();
  $("#kda2").hide();
  $("#kda3").hide();
  $(document).ready(function(){
    document.getElementById('tanggal').valueAsDate = new Date();
    $("#submitpilih").click(function(){
      var pilihan = $( "#pilihkda" ).val();
      if (pilihan == 1) {
        jenis_kda = 1 ;
        $('#jenis_kda').val(pilihan);
        $("#kda1").show();
        $("#kda2").hide();
        $("#kda3").hide();
      }
      else if (pilihan == 2)
      {
        jenis_kda = 2 ;
        $('#jenis_kda2').val(pilihan);
        $("#kda2").show();
        $("#kda1").hide();
        $("#kda3").hide();
      }
      else
      {
        if (pilihan == 3) $('#judulform').text('Form Kda tanpa audit');
        else $('#judulform').text('Form Kda tanpa pengajuan UMK');
        $('#jenis_kda3').val(pilihan);
        $("#kda3").show();
        $("#kda2").hide();
        $("#kda1").hide(); 
      }
      
    });

  var postURL = "<?php echo url('tambahkda3'); ?>";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('#submitkda3').click(function(){            
     $.ajax({  
      url:postURL,  
      method:"POST",  
      data:$('#add_kda3').serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          printErrorMsg(data.error);
        }else{
          $(".print-success-msg").find("ul").html('');
          $(".print-success-msg").css('display','block');
          $(".print-error-msg").css('display','none');
          $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.<button type="button" class="close" data-dismiss="alert">×</button></li>');
        }
      }  
    });  
   });  
    function printErrorMsg (msg) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display','block');
     $(".print-success-msg").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
   } 
  }); 
</script>

<script type="text/javascript">
  //document.getElementById('tanggal1').valueAsDate = new Date();
  $(document).ready(function(){      
    var postURL = "<?php echo url('tambahkda1'); ?>";
    var i=1;  
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('#submitkda1').click(function(){            
     $.ajax({  
      url:postURL,  
      method:"POST",  
      data:$('#add_kda1').serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          printErrorMsg(data.error);
        }else{
          i=1;
          $('.dynamic-added').remove();
          $('#add_kda1')[0].reset();
          $(".print-success-msg").find("ul").html('');
          $(".print-success-msg").css('display','block');
          $(".print-error-msg").css('display','none');
          $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.<button type="button" class="close" data-dismiss="alert">×</button></li>');
        }
      }  
    });  
   });  
    function printErrorMsg (msg) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display','block');
     $(".print-success-msg").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
   } 
  });   
</script>

<script type="text/javascript">
  $(document).ready(function(){      
    var postURL = "<?php echo url('tambahkda2'); ?>";
    var i=1;  


    $('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="kwitansi[]" placeholder="nomor kwitansi" class="form-control name_list" /></td><td><input type="text" name="nominal[]" placeholder="masukkan nominal" class="form-control name_list" /></td><td><input type="text" name="keterangan[]" placeholder="masukkan keterangan" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   });  


    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('#submitkda2').click(function(){            
     $.ajax({  
      url:postURL,  
      method:"POST",  
      data:$('#add_kda2').serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          printErrorMsg(data.error);
        }else{
          i=1;
          $('.dynamic-added').remove();
          $('#add_kda2')[0].reset();
          $(".print-success-msg").find("ul").html('');
          $(".print-success-msg").css('display','block');
          $(".print-error-msg").css('display','none');
          $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.<button type="button" class="close" data-dismiss="alert">×</button></li>');
        }
      }  
    });  
   });  
    function printErrorMsg (msg) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display','block');
     $(".print-success-msg").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
   }
 });  
</script>

<script src="adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
</body>
</html>