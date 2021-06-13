<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <h3>Edit Data Pegawai</h3>
        </div>

        <div class="card-body">
        <form action="{{url('update-pegawai', $peg->id)}}" method="">
          {{@csrf_field()}}
          <div class="form-group">
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Pegawai" value="{{$peg->nama}}">
          </div>

          <div class="form-group">
            <select class="form-control select2" style="width: 100%;" name="jabatan_id" id="jabatan_id">
              <option value disabled>Pilih Jabatan</option>
              <option value="{{$peg->jabatan_id}}">{{$peg->jabatan->jabatan}}</option>
                @foreach ($jab as $item)
                <option value="{{$item->id}}">{{$item->jabatan}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Pegawai">{{$peg->alamat}}</textarea>
          </div>

          <div class="form-group">
            <input type="date" id="tgllhr" name="tgllhr" class="form-control" placeholder="Tgl Lahir"  value="{{$peg->tgllhr}}">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
     </div>
     </div>
   </div>
 </div>
  <footer class="main-footer">
   @include('Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
 @include('Template.script')
</body>
</html>
