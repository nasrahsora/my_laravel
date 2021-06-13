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
          <div class="card-tools">
            <a href="{{ route('create-pegawai') }}" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>

            <a href="{{ route('cetak-pegawai') }}" target="_blanks" class="btn btn-primary">Cetak Data<i class="fas fa-print"></i></a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Jabatan</td>
              <td>Alamat</td>
              <td>Tgl Lahir</td>
              <td>Aksi</td>
            </tr>

            @foreach ($dtPegawai as $item)
             <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->jabatan->jabatan}}</td>
              <td>{{$item->alamat}}</td>
              <td>{{date('d-m-Y', strtotime($item->tgllhr)) }}</td>
              <td>
                <a href="{{ url('edit-pegawai',$item->id)}}"><i class="fas fa-edit"></i></a> |
                <a href="{{ url('delete-pegawai',$item->id)}}"><i class="fas fa-trash-alt" style="color:red;"></i></a> 
              </td>
            </tr>
            @endforeach
          </table>
     </div>
     <div class="card-footer">
      {{$dtPegawai->links()}}
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
 @include('sweetalert::alert')
</body>
</html>
