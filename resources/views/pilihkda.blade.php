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
<body>


  <div class="container">
    <div class="box-header">
      <h3 class="box-title">Pilih Jenis KDA</h3>
    </div>
    <select id="pilihkda">
      <!-- <option value="" disabled selected>Select your option</option> -->
      <option value="1">kda dengan Temuan</option>
      <option value="2">kda tanpa Temuan</option>
      <option value="3">kda Unaudited</option>
      <option value="4">kda tanpa pengajuan UMK</option>
    </select>
    <input type="button" name="submitpilih" id="submitpilih" class="btn btn-info" value="buat kda" />


    <div class="form-group" id="kda1">
      <h2 align="center">FORM KDA DENGAN TEMUAN</h2> 
      <form name="add_kda1" id="add_kda1">  


        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
        </div>


        <div class="alert alert-success print-success-msg" style="display:none">
          <ul></ul>
        </div>
        <div class="form-group">
          {{-- <td><input type="text" name="unit[] list="unit" /></td> --}}
          {{--         <td><input type="text" name="unit[]" placeholder="masukkan unit" list="unit" class="form-control name_list" /></td>
          <datalist id="unit">
            @foreach( $unit as $unit)
            <option value="{{$unit->id}}">{{$unit->nama}}</option>
            @endforeach
          </datalist> --}}
          <select class="form-control select2" name="unit[]">
            <option></option>
            @foreach($unit as $unit)
            <option value="{{$unit->id_unit}}">{{$unit->nama}}</option>
            @endforeach
          </select>  
        </div>
        <div class="form-group">
          <td><input type="date" id="tanggal" name="tanggal[]" placeholder="Pilih tanggal" class="form-control name_list" /></td>  
        </div>

        <div class="table-responsive">
        <div class="box-header">
                <h3 class="box-title">Temuan</h3>
              </div>  
          <table class="table table-bordered" id="dynamic_field">  
            <tr>  
              <td><input type="text" name="kwitansi[]" placeholder="Nomor kwitansi" class="form-control name_list" /></td>  
              <td><input type="text" name="nominal[]" placeholder="masukkan nominal" class="form-control name_list" /></td>  
              <td><input type="text" name="keterangan[]" placeholder="masuk keterangan" class="form-control name_list" /></td>  
              <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
          </table>  
          <input type="button" name="submitkda1" id="submitkda1" class="btn btn-info" value="Submit" />  
        </div>


      </form>  
    </div> 
  </div>


  <div class="container" id="kda2">
    <h2 align="center">FORM KDA TANPA TEMUAN</h2>  
    <div class="form-group">
     <form name="add_kda2" id="add_kda2">  


      <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
      </div>


      <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
      </div>
      <div class="form-group">
        <select class="form-control select2" name="unit1[]">
          <option></option>
          @foreach($unit1 as $unit1)
          <option value="{{$unit1->id_unit}}">{{$unit1->nama}}</option>
          @endforeach
        </select>  
      </div>
      <div class="form-group">
        <td><input type="date" id="tanggal" name="tanggal[]" placeholder="Pilih tanggal" class="form-control name_list" /></td>  
      </div>
      <input type="button" name="submitkda2" id="submitkda2" class="btn btn-info" value="Submit1" />
    </form>  
  </div> 
</div>

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
  $("#kda1").hide();
  $("#kda2").hide();
  // function displayVals() {
  //   var pilihan = $( "#pilihkda" ).val();
  //   console.log(pilihan);
  // }
  // $( "select" ).change( displayVals );
  // displayVals();
  $(document).ready(function(){
    document.getElementById('tanggal').valueAsDate = new Date();
    $("#submitpilih").click(function(){
      var pilihan = $( "#pilihkda" ).val();
      if (pilihan == 1) {
        $("#kda1").show();
        $("#kda2").hide();
      }
      else
      {
        $("#kda2").show();
        $("#kda1").hide();
      }
      
    });
  });s
</script>
<script type="text/javascript">
  $(document).ready(function(){      
    var postURL = "<?php echo url('tambahkda1'); ?>";
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
          $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
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
    var postURL = "<?php echo url('tambahkda2'); ?>";
    var i=1;  
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
          $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
        }
      }  
    });  
   });  
  });  
</script>

<script src="adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  // var e = document.getElementById("pilihkda");
  // var pilihan = e.options[e.selectedIndex].value;
  // var pilihan = $( "#pilihkda" ).val();
  // console.log("hehe");
  // console.log(pilihan);
  // function displayVals() {
  //   var pilihan = $( "#pilihkda" ).val();
  //   console.log(pilihan);
  //   // var link = "{{ url('pilihkda/" +pilihan;
  //   // var link2 = link +"') }"+"}";
  //   var link = "pilihkda/"+pilihan;
  //   console.log(link);
  //   // console.log(link2);
  //   //$('#pilihan').attr("href",link)
  // }
  // $( "select" ).change( displayVals );
  // displayVals();
</script> 
</body>
</html>