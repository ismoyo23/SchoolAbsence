<?php  ?>
@extends('theme')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
          
              <li class="breadcrumb-item active">Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <div class="row">
                <h3>Table Absensi</h3>
              
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Guru</th>
                    <th>Kode Kelas</th>
                    <th>Nama Guru</th>
                    <th>Kelas</th>
                    <th>Jam</th>
                    <th>Materi</th>
                    <th>Status</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                <?php foreach ($data as $key): ?>
                  <tr>
                    <td><?php echo $key->nik; ?></td>
                    <td><?php echo $key->code_room; ?>
                    </td>
                    <td><?php echo $key->name_user; ?></td>
                    <td><?php echo $key->class; ?></td>
                    <td><?php echo $key->jam_ke; ?></td>
                    <td><?php echo $key->materi; ?></td>
                    <td><?php echo $key->status; ?></td>
                    
                  </tr>
                <?php endforeach ?>
                  
                

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kode Guru</th>
                    <th>Kode Kelas</th>
                    <th>Nama Guru</th>
                    <th>Kelas</th>
                    <th>Jam</th>
                    <th>Materi</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Powered By Tim SMK Negeri 2 Trenggalek.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js') }}"></script>
<!-- page script -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>

<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


  setInterval(function(){
      window.location.reload();
   }, 3600000);
    
    
  });
</script>

</body>
</html>
@endsection