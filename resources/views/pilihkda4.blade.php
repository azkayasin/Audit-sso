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
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-puex{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center}
.tg .tg-lj5e{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-vlyc{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:left;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
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
                      <select class="form-control select2" name="unit">
                        <option></option>
                        @foreach($unit as $data => $value)
                        <option value="{{$value->id_unit}}">{{$value->nama}}</option>
                        @endforeach
                      </select>  
                    </div>
                    <div class="form-group">
                      <label class="control-label">Masa Audit</label>
                      <td><input type="month" name="masa_audit" class="masa_audit form-control name_list" /></td>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Bulan Audit</label>
                    <td><input type="date" name="bulan_audit" placeholder="Pilih tanggal" class=" bulan_audit form-control name_list" /></td>
                    </div>
                    <table class="table table-bordered" id="dynamic_field2">  
                    <thead>
                            <tr>
                              <th>Kelengkapan</th>
                              <th>Ada / Tidak Ada</th>
                              <th>Jumlah</th>
                              <th>Nominal</th>
                            </tr>
                          </thead>
                    <tr>
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Rekap Per Mak" /></td>  
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>  
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td> 
                      <td><button type="button" name="add" id="add2" class="btn btn-success">Add More</button></td>  
                    </tr>
                    <tr id="krow1">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Rekap SPJ (urut)" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow2">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Kwitansi di Rekap SPJ" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow3">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Fisik kwitansi yang ada" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow4">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Kwitansi Yang Ada Temuan" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="4" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow5">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="BA Serah Terima UMK" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="5" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow6">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="BA Rekonsiliasi" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="6" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow7">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Transaksi Jurnal" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="7" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                    <tr id="krow8">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Bukti Setor Saldo" /></td>
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td>
                      <td><button type="button" name="remove" id="8" class="btn btn-danger btn_remove2">X</button></td>
                    </tr>
                  </table> 
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
          <select class="form-control select2" name="unit">
            <option></option>
            @foreach($unit as $data => $value)
             <option value="{{$value->id_unit}}">{{$value->nama}}</option>
             @endforeach
          </select>  
        </div>
        <div class="form-group">
          <label class="control-label">Masa Audit</label>
          <td><input type="month" name="masa_audit" class="masa_audit form-control name_list" /></td>
        </div>
        <div class="form-group">
          <label class="control-label">Bulan Audit</label>
        <td><input type="date" class="bulan_audit" name="bulan_audit" placeholder="Pilih tanggal" class="form-control name_list" /></td>
        </div>
        <div class="tg-wrap"><table class="table table-bordered">
            <tr>
              <th class="tg-puex" rowspan="2">No</th>
              <th class="tg-puex" rowspan="2">Kelengkapan</th>
              <th class="tg-lj5e" colspan="3">Keterangan</th>
            </tr>
            <tr>
              <td class="tg-lj5e">Ada / Tidak ada</td>
              <td class="tg-lj5e">Jumlah</td>
              <td class="tg-lj5e">Nominal</td>
            </tr>
            <tr>
              <td class="tg-vlyc">1</td>
              <td class="tg-vlyc">Rekap Per Mak</td>
              <td class="tg-vlyc"><input type="hidden" name="item1" id="item1" value="0"><input type="checkbox" name="item1" id="item1" value="1"><br></td>
              <td class="tg-vlyc"><input type="number" name="item1_jum" id="item1_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item1_nom" id="item1_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">2</td>
              <td class="tg-vlyc">Rekap SPJ (urut)</td>
              <td class="tg-vlyc"><input type="hidden" name="item2" id="item2" value="0"><input type="checkbox" name="item2" id="item2" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item2_jum" id="item2_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item2_nom" id="item2_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">3</td>
              <td class="tg-vlyc">Kwitansi di Rekap SPJ</td>
              <td class="tg-vlyc"><input type="hidden" name="item3" id="item3" value="0"><input type="checkbox" name="item3" id="item3" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item3_jum" id="item3_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item3_nom" id="item3_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">4</td>
              <td class="tg-vlyc">Fisik kwitansi yang ada</td>
              <td class="tg-vlyc"><input type="hidden" name="item4" id="item4" value="0"><input type="checkbox" name="item4" id="item4" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item4_jum" id="item4_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item4_nom" id="item4_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">5</td>
              <td class="tg-vlyc">Kwitansi yang ada temuan</td>
              <td class="tg-vlyc"><input type="hidden" name="item5" id="item5" value="0"><input type="checkbox" name="item5" id="item5" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item5_jum" id="item5_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item5_nom" id="item5_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">6</td>
              <td class="tg-vlyc">BA Serah Terima UMK</td>
              <td class="tg-vlyc"><input type="hidden" name="item6" id="item6" value="0"><input type="checkbox" name="item6" id="item6" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item6_jum" id="item6_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item6_nom" id="item6_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">7</td>
              <td class="tg-vlyc">BA Rekonsiliasi</td>
              <td class="tg-vlyc"><input type="hidden" name="item7" id="item7" value="0"><input type="checkbox" name="item7" id="item7" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item7_jum" id="item7_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item7_nom" id="item7_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">8</td>
              <td class="tg-vlyc">Transaksi Jurnal</td>
              <td class="tg-vlyc"><input type="hidden" name="item8" id="item8" value="0"><input type="checkbox" name="item8" id="item8" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item8_jum" id="item8_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item8_nom" id="item8_nom"></td>
            </tr>
            <tr>
              <td class="tg-vlyc">9</td>
              <td class="tg-vlyc">Bukti Setor Saldo</td>
              <td class="tg-vlyc"><input type="hidden" name="item9" id="item9" value="0"><input type="checkbox" name="item9" id="item9" value="1"></td>
              <td class="tg-vlyc"><input type="number" name="item9_jum" id="item9_jum"></td>
              <td class="tg-vlyc"><input type="number" name="item9_nom" id="item9_nom"></td>
            </tr>
          </table></div>
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
      </div>
      <div class="form-group">
        <label class="control-label">Masa Audit</label>
        <td><input type="month" name="masa_audit" class="masa_audit form-control name_list" /></td>
      </div>
      <div class="form-group">
        <label class="control-label">Bulan Audit</label>
      <td><input type="date" class="bulan_audit" name="bulan_audit" placeholder="Pilih tanggal" class="form-control name_list" /></td>
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
        <label class="control-label">Tanggapan</label>
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
  

<script type="text/javascript">
  var jenis_kda;
  $("#kda1").hide();
  $("#kda2").hide();
  $("#kda3").hide();
  $(document).ready(function(){
    $("#submitpilih").click(function(){
      //document.getElementById('bulan_audit').valueAsDate = new Date();
      $('#add_kda1')[0].reset();
      $('#add_kda2')[0].reset();
      $('#add_kda3')[0].reset();
      $('.select2').select2(
        {
          placeholder: "Pilih Unit",
          allowClear: true
        })
      var list = document.getElementsByClassName("bulan_audit");
      for(var i = 0; i< list.length;i++){
        document.getElementsByClassName("bulan_audit")[i].valueAsDate = new Date();
        var masa_audit = new Date();
        masa_audit.setMonth(masa_audit.getMonth()-1);
        document.getElementsByClassName("masa_audit")[i].valueAsDate = masa_audit;
      }
      var pilihan = $( "#pilihkda" ).val();
      if (pilihan == 1) {
        jenis_kda = 1 ;
        $('.dynamic-added2').remove();
        $('#jenis_kda').val(pilihan);
        $("#kda1").show();
        $("#kda2").hide();
        $("#kda3").hide();
      }
      else if (pilihan == 2)
      {
        jenis_kda = 2 ;
        $('.dynamic-added2').remove();
        $('#jenis_kda2').val(pilihan);
        $("#kda2").show();
        $("#kda1").hide();
        $("#kda3").hide();
      }
      else
      {
        if (pilihan == 3)
        {
          $('#judulform').text('Form Kda tanpa audit');
        } 
        else {

          $('#judulform').text('Form Kda tanpa pengajuan UMK');
        }

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
          $('#add_kda3')[0].reset();
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
    var i=9; 

    $('#add2').click(function(){  
     i++;  
     $('#dynamic_field2').append('<tr id="krow'+i+'" class="dynamic-added2"><td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" /></td><td><select name="kesediaan[]"><option value=""></option><option value="Ada">Ada</option><option value="Tidak Ada">Tidak</option></select></td> <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td><td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove2">X</button></td></tr>');  
   });  


    $(document).on('click', '.btn_remove2', function(){  
     var button_id = $(this).attr("id");   
     $('#krow'+button_id+'').remove();  
   });  
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
          $("#kda1").hide();
          $('.dynamic-added2').remove();
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