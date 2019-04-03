<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
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
       <form action="{{route('summernotePersist')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
                    <label class="col-sm-2 control-label">Tipe</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipe" class="form-control" placeholder="Tipe" value="">
                    </div>
                </div>
        <textarea name="summernoteInput" class="summernote"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    </div>
  </div>
 
    {{-- <form class="form-horizontal" method="POST" action="{{route('summernotePersist')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipe</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipe" class="form-control" placeholder="Tipe" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Konten</label>
                    <div class="col-sm-10">
                        <textarea id="konten_editor" name="summernoteInput" class="summernote"
                                  placeholder="Konten"></textarea>
                    </div>
                </div>

                <div class="box-footer text-right">
                    <a href="{{URL::previous()}}" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </form> --}}
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>  
    
    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 100
      });
    </script>
  </body>
</html>