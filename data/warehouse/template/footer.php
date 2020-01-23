<!-- Section Akhir -->
</section>
</div>

<footer class="main-footer">
   <strong>Copyright &copy; 2019 <a href="#">AdminLTE.io</a>.</strong>
   Mahasiswa Politeknik Negeri Malang
   <div class="float-right d-none d-sm-inline-block">
   <b>Version</b> 1.0.0(Beta)
   </div>
</footer>

<!-- Basic Import javascript -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script> -->
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Sweetalert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script>
  // Sweetalert untuk logout
  function logout() {
      Swal.fire({
            type: 'success',
            html: 'Logout Sukses!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            focusConfirm: true,
            showConfirmButton: true
            
      }).then(function() {
            window.location.href = "../../",
            console.log("The OK Button was clicked");
      })
  }
</script>

<!-- PROSES LOGOUT -->
<?php
  if (isset($_POST['logout'])) {
      if ($data->logout($_SESSION['id_karyawan'])) {
        echo "<script>logout()</script>";
      } else {
        echo '<script>alert("gagal")</script>';
      }
  }
?>

</body>
</html>