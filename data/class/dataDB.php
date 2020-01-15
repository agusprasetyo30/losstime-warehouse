<?php
   include "dataArray.php";

   class dataDB extends dataArray {

      // Constructor
      function __construct()
      {
         $hostname = "localhost";
         $username = "root";
         $password = "gokpras123";
         $database = "warehouse";

         $this->koneksi = mysqli_connect($hostname, $username, $password, $database) or trigger_error(mysqli_error($this->koneksi), E_USER_NOTICE);
      }

      // fungsi untuk menampilkan data select dengan cara memasukan query ke dalam parameter
      function query($query){
         $result = mysqli_query($this->koneksi, $query);
         $rows = [];
         while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
         }
         return $rows;
      }

      // fungsi untuk menambahkan pengguna
      function addUser($post) 
      {
         $nama = htmlspecialchars($post['nama']);
         $id_karyawan = htmlspecialchars($post['id_karyawan']);

         $password = mysqli_real_escape_string($this->koneksi, $post['password']);
         $password2 = mysqli_real_escape_string($this->koneksi, $post['confirm_password']);

         //mengecek ID Karyawan
         $query = mysqli_query($this->koneksi, "SELECT id_karyawan FROM user WHERE id_karyawan='$id_karyawan' ");
         
         if (mysqli_fetch_assoc($query)) {
            echo "
               <script>
                  alert('ID Anggota sudah terdaftar');
                  window.location = 'tambah_pengguna.php?type=tambah-pengguna';
               </script>
            ";
            return false;
         }

         //cek informasi password
         if ($password !== $password2) {
            echo "
               <script>
                  alert('Tidak dapat menambahkan pengguna');
               </script>
            ";
            die();
            return false;
         }

         //enkripsi password
         $password = password_hash($password, PASSWORD_DEFAULT);

         // waktu dan tanggal hari ini
         $waktu = date('Y-m-d H:i:s');
         
         // Query tambah data
         $query = "INSERT INTO user VALUES(NULL, '$nama', '$id_karyawan', '$password', '$waktu')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      // Menambahkan data losstime
      function addLosstime($post)
      {
         $line = $post['line'];
         $shift = $post['shift'];
         $jam_kerja = $post['jam_kerja'];
         $masalah = $post['masalah'];
         $jml_losstime = $post['jumlah_losstime'];
         $id_user = $post['id_user'];

         // waktu dan tanggal hari ini
         $waktu = date('Y-m-d H:i:s');

         // Query tambah data
         $query = "INSERT INTO losstime VALUES(NULL, '$line', '$shift', '$jam_kerja', '$masalah', '$jml_losstime', '$id_user', '$waktu')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }      

      // menginputkan running text
      function addRunningText($post) 
      {
         $text = $post['input_running'];

         // Query tambah data
         $query = "INSERT INTO running_text VALUES(NULL, '$text')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      // menampilkan data running text kedalam tabel
      function showListRunningText()
      {
         $query = "SELECT * FROM running_text";
         return $this->query($query);
      }

      // menampilkan data running text berdasarkan ID
      function showListRunningTextByID($id)
      {
         $query = "SELECT * FROM running_text WHERE id = '$id'";
         return $this->query($query)[0];
      }

      // mengupdate data running text dengan mengambil inputan dan ID
      function updateRunningText($post , $id) 
      {
         $text = $post['input_running'];

         $query = "UPDATE running_text SET text = '$text' WHERE id = '$id' ";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      // menghapus data running text
      function deleteRunningText($id){
         $query = "DELETE FROM running_text WHERE id = '$id'";

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }
   }
?>