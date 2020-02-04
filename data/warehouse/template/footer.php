<!-- Section Akhir -->
</section>
</div>

<footer class="main-footer">
   <strong>Copyright &copy; <?= date('Y') ?></strong>
   <a href="https://github.com/agusprasetyo30">
     Mahasiswa Politeknik Negeri Malang
   </a>
   <div class="float-right d-none d-sm-inline-block">
   <b>Version</b> 1.0.0(Beta)
   </div>
</footer>

<!-- Basic Import javascript -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
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