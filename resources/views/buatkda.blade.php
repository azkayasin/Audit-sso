<?php
if (!isset($_SESSION['userinfo2']))
        {
            return redirect('/login2');
        }
else {
  $userinfo = $_SESSION['userinfo2'];
  $username = $_SESSION['username'];
}
?>
@extends('admin.template.template')
@section('judul')
  Buat KDA
@endsection
@section('dimana')
  <li>KDA</li>
  <li class="active">Buat KDA</li>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title">Buat KDA</h3>
        </div>
          <div class="box-body">
            <input id="auditor1" readonly="readonly" type="hidden" value="<?php echo $username; ?>"  size="19" />
            <select id="pilihkda">
              <!-- <option value="" disabled selected>Select your option</option> -->
              <option value="1">kda tanpa Temuan</option>
              <option value="2">kda dengan Temuan</option>
              <option value="3">kda Unaudited</option>
              <option value="4">kda tanpa pengajuan UMK</option>
            </select>
          <input type="button" name="submitpilih" id="submitpilih" class="btn btn-info" value="buat kda" />
        </div>
    </div>
    <div id="peringatan"></div>
    @foreach( $summernote as $summernote)
                    {!! $summernote->content !!}
                    @endforeach
  </div>
</div>
@endsection

@section('addjs')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
  var keterangan1 = `<tr id="krow0">
                      <td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" value="Rekap Per Mak" /></td>  
                      <td><select name="kesediaan[]">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak</option>
                      </select></td>
                      <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td>  
                      <td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td> 
                      <td><button type="button" name="remove" id="0" class="btn btn-danger btn_remove1">X</button></td>  
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
                      <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="4" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="5" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="6" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="7" class="btn btn-danger btn_remove1">X</button></td>
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
                      <td><button type="button" name="remove" id="8" class="btn btn-danger btn_remove1">X</button></td>
                    </tr>`;

  var jenis_kda;
  var postURL;
  var auditor = $("#auditor1").val();
  $("#kda1").hide();
  $("#kda2").hide();
  $("#kda3").hide();
  $("#kda4").hide();
  $(document).ready(function(){
    $("#submitpilih").click(function(){
      //$(".auditor").val(auditor);
      $("#peringatan").empty();
      var listunit = `<select id="unit" class="unit2" name="unit" required=""  style="width: 15%">>
                      <option></option>
                      @foreach($unit as $data => $value)
                      <option value="{{$value->id_unit}}">{{$value->nama}}</option>
                      @endforeach</select>`;
      $(".listunit").empty();
      $(".listunit").append(listunit);
      // document.getElementById('bulan_audit').valueAsDate = new Date();
      $(function () {
        //Initialize Select2 Elements
        $('.unit2').select2(
        {
          placeholder: "Pilih Unit",
          allowClear: true
        })
      })
      var pilihan = $( "#pilihkda" ).val();
      if (pilihan == 1) {
        console.log(auditor);
        $('#add_kda1')[0].reset();
        $('#dynamic-added1').remove();
        $(".keterangan1").empty();
        $(".keterangan1").append(keterangan1);
        jenis_kda = 1 ;
        postURL = "<?php echo url('tambahkda1'); ?>";
        $('#jenis_kda').val(pilihan);
        $("#kda1").show();
        $("#kda2").hide();
        $("#kda3").hide();
        $("#kda4").hide();
      }
      else if (pilihan == 2)
      {
        //$('#add_kda2')[0].reset();
        $('#dynamic-added2').remove();
        $(".keterangan1").empty();
        $(".keterangan1").append(keterangan1);
        jenis_kda = 2 ;
        postURL = "<?php echo url('tambahkda2'); ?>";
        $('#jenis_kda2').val(pilihan);
        $("#kda2").show();
        $("#kda1").hide();
        $("#kda3").hide();
        $("#kda4").hide();
      }
      else if (pilihan == 3)
      {
        $('#add_kda3')[0].reset();
        $('#judulform').text('Form Kda tanpa audit');
        jenis_kda = 3 ;
        postURL = "<?php echo url('tambahkda3'); ?>";
        //$('#jenis_kda'+jenis_kda).val(pilihan);
        $("#kda3").show();
        $("#kda4").hide();
        $("#kda2").hide();
        $("#kda1").hide(); 
      }
      else
      {
        //$('#add_kda4')[0].reset();
        jenis_kda = 4 ;
        postURL = "<?php echo url('tambahkda3'); ?>";
        $('#judulform'+jenis_kda+'').text('Form Kda tanpa pengajuan UMK');
        // $('#jenis_kda'+jenis_kda+'').val(pilihan);
        $("#kda4").show();
        $("#kda3").hide();
        $("#kda2").hide();
        $("#kda1").hide();
      }
      const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
          "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
      var tanggal_sekarang = new Date();
      var tanggal_audit = new Date();
      tanggal_audit.setMonth(tanggal_audit.getMonth()-1);
      var bulan = monthNames[tanggal_audit.getMonth()];
      var tahun = tanggal_audit.getFullYear();
      var bulan_audit = document.getElementsByClassName("bulan_audit");
      for(var i = 0; i< bulan_audit.length ;i++){
        document.getElementsByClassName("bulan_audit")[i].valueAsDate = tanggal_sekarang;
      }
      var masa_audit = document.getElementsByClassName("masa_audit");
      for(var i = 0; i< masa_audit.length ;i++){
        document.getElementsByClassName("masa_audit")[i].valueAsDate = tanggal_audit;
        $('#kondisi1').val("SPJ bulan "+bulan+" tahun "+tahun+" belum diserahkan.");
      }
      var jumlahbulan = document.getElementsByClassName("bulan");
      for(var i = 0; i< jumlahbulan.length ;i++){
        document.getElementsByClassName("bulan")[i].value = bulan;
      }
      var jumlahtahun = document.getElementsByClassName("tahun");
      for(var i = 0; i< jumlahtahun.length ;i++){
        document.getElementsByClassName("tahun")[i].value = tahun;
      }
      var jumlahauditor = document.getElementsByClassName("auditor");
      for(var i = 0; i< jumlahauditor.length ;i++){
        document.getElementsByClassName("auditor")[i].value = auditor;
      }
      

      $('.unit2').on('select2:select', function (e) {
        var isiunit = document.getElementsByClassName("unit");
        for(var i = 0; i< isiunit.length;i++){
          document.getElementsByClassName("unit")[i].value = e.params.data.text;
          $('#kondisi').val("Unit Kerja : "+e.params.data.text+" pada bulan "+bulan+" tahun "+tahun+ " tidak mencairkan UMK.");

        }
        if (pilihan == 2)
        {
          $("#temuanlama").empty();
            $.ajax({
            url: '/temuan/temuanlama',
            type: 'POST',
            data: {
              '_token': "{{ csrf_token() }}",
              'unit' : e.params.data.id,
              'bulan' : tanggal_sekarang.getMonth()+1,
              'tahun' : tanggal_sekarang.getFullYear()
            },
            error: function() {
              console.log('Error');
            },
            dataType: 'json',
            success: function(data1) {

              console.log(data1);
              var jumlah = data1.length;
              // console.log(jumlah);
              var katatampung = ``;
              var katatemuan = ``;
              var temuansemua = ``;
              if (jumlah > 0){
                $("#temuanlama").append(`<li style="text-align: justify;">&nbsp; &nbsp; Hasil audit dokumen SPJ diketahui bahwa pengelolaan administrasi keuangan tahun <input class="tahun" readonly="readonly" type="text" /> yang dilaksanakan BPP di Unit Kerja : <input class="unit" readonly="readonly" type="text" /> yang belum ditindaklanjuti, antara lain:</li><div></div>`);
              for (var jbulan = 1; jbulan <= 12; jbulan++) {
                var flag =0;
                temuansemua = `<table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Kwitansi</th>
                        <th>nominal</th>
                        <th>keterangan</th>
                      </tr>
                      </thead>
                      <tbody>`;
                for (var i = 0; i < jumlah; i++)
                {
                  var nbulan = data1[i]['bulan_audit'];
                  nbulan = new Date (nbulan);
                  nbulan = nbulan.getMonth();
                  console.log("bulan");
                  console.log(nbulan);

                  if (nbulan == jbulan) {
                    flag =1;
                    nbulan = monthNames[nbulan];
                    katatemuan = `Temuan Bulan ${nbulan}`;
                    var kwitansi = data1[i]['kwitansi'];
                    var nominal = data1[i]['nominal'];
                    var keterangan = data1[i]['keterangan'];
                    var id = data1[i]['id'];
                    var detailtemuan = 
                  `<tr><td>${kwitansi}</td><td>${nominal}</td><td>${keterangan}</td></tr>`;
                   temuansemua = temuansemua.concat(detailtemuan);
                    }
                }
                if (flag == 1) {
                  detailtemuan = `</tbody>
                  </table>`;
                  temuansemua = temuansemua.concat(detailtemuan);
                  katatampung = katatampung.concat(katatemuan);
                  katatampung = katatampung.concat(temuansemua);
                  // console.log(temuansemua);
                  // katatemuan = katatemuan.concat(temuansemua);  
                }
                  
              }
              console.log(katatampung);
              $("#temuanlama").append(katatampung);
              }

              
              var jumlahtahun = document.getElementsByClassName("tahun");
              for(var i = 0; i< jumlahtahun.length ;i++){
                document.getElementsByClassName("tahun")[i].value = tanggal_audit.getFullYear();
              }
              var isiunit = document.getElementsByClassName("unit");
              for(var i = 0; i< isiunit.length;i++){
                document.getElementsByClassName("unit")[i].value = e.params.data.text;
              }
            }
          })
        }
        //console.log(e.params.data);
      });
      
    });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

     $('.submitkda').click(function(){  
      $("#peringatan").empty();
      $.ajax({  
      url:postURL,  
      method:"POST",  
      data:$('#add_kda'+jenis_kda).serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          printErrorMsg(data.error);
        }else{
          $('#kda'+jenis_kda+'').hide();
          $('#add_kda'+jenis_kda+'')[0].reset();
          $("#peringatan").append(`<div class="alert alert-success print-success-msg" style="display:none">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Sukses!</h4>
              <ul></ul>
            </div>`)
          $(".print-success-msg").find("ul").html('');
          $(".print-success-msg").css('display','block');
          $(".print-error-msg").css('display','none');
          $(".print-success-msg").find("ul").append('<li>Berhasil Membuat KDA</li>');
        }
      }  
    });
     
   });  
    function printErrorMsg (msg) {
     $("#peringatan").append(`<div class="alert alert-danger print-error-msg" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
        <ul></ul>
      </div>`)
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
    var i=9; 

    $('.add1').click(function(){  
     i++;  
     $('.keterangan1').append('<tr id="krow'+i+'" class="dynamic-added1"><td><input type="text" name="kelengkapan[]" placeholder="jenis Kelengkapan" class="form-control name_list" /></td><td><select name="kesediaan[]"><option value=""></option><option value="Ada">Ada</option><option value="Tidak Ada">Tidak</option></select></td> <td><input type="text" name="jumlah[]" placeholder="masukkan jumlah" class="form-control name_list" /></td><td><input type="text" name="nom[]" placeholder="masukkan nominal" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1">X</button></td></tr>');  
   });  


    $(document).on('click', '.btn_remove1', function(){  
     var button_id = $(this).attr("id");   
     $('#krow'+button_id+'').remove();  
   });
     
  });   
</script>

<script type="text/javascript">
  $(document).ready(function(){      
    var i=1;  

    $('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="kwitansi[]" placeholder="nomor kwitansi" class="form-control name_list" /></td><td><input type="text" name="nominal[]" placeholder="masukkan nominal" class="form-control name_list" /></td><td><input type="text" name="keterangan[]" placeholder="masukkan keterangan" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   });  


    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  
 });  
</script>

{{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  --}}

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>  

<script src="adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
@endsection