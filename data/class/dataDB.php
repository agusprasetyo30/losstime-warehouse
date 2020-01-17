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
      private function query($query)
      {
         $result = mysqli_query($this->koneksi, $query);
         $rows = [];
         while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
         }
         return $rows;
      }

      /**
       * Pengguna
       */

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
            return 'id_kar';
         }

         //cek informasi password
         if ($password !== $password2) {
            return 'pass';
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

      /**
       * Losstime
       */

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

      // menampilkan losstime berdasarkan tanggal hari ini
      function showLosstimeByDay($dayDate) 
      {
         $query = "SELECT * FROM losstime WHERE DATE(created_at) = '$dayDate' ";
         
         return $this->query($query);
      }

      // menghitung total losstime berdasarkan tanggal hari ini
      function countLosstimeByDay($dayDate) 
      {
         $query = "SELECT sum(jml_losstime) as jumlah FROM losstime WHERE DATE(created_at) = '$dayDate' GROUP BY DATE(created_at) ";
         
         return $this->query($query)[0]['jumlah'];
      }
      
      // menampilkan losstime berdasarkan bulan
      function showLosstimeByMonth() 
      {
         $query = "SELECT count(line) as jumlah_line, sum(jml_losstime) AS jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime 
            GROUP BY MONTH(created_at), YEAR(created_at)";
         
         return $this->query($query);
      }

      // menampilkan dan sorting losstime berdasarkan bulan dan tahun
      function showLosstimeByMonthYear($month, $year)
      {
         $query = "SELECT count(line) as jumlah_line, sum(jml_losstime) AS jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime 
            WHERE MONTH(created_at) = '$month' AND YEAR(created_at) = '$year' GROUP BY MONTH(created_at), YEAR(created_at)";
      
         return $this->query($query)[0];
      }

      // menampilkan seua losstime dalam bulan dan tahun tertentu
      function showAllLostimeByMonthYear($month, $year)
      {
         $query = "SELECT * FROM losstime WHERE MONTH(created_at) = '$month' AND YEAR(created_at) = '$year' ORDER BY created_at ASC ";

         return $this->query($query);
      }

      // Menghitung jumlah losstime pada tahun tertentu
      function countLosstimeByYear($year)
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY YEAR(created_at) ";

         return $this->query($query)[0]['jumlah_menit'];
      }

      // menampilkan jumlah menit berdasarkan tahun
      function showLosstimeCountByYear($year)
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY MONTH(created_at) ";

         return $this->query($query);
      }

      // data array losstime yang terdapat pada grafik
      function getDataGrafikLosstime($year)
      {
         $data_arr = [];
         $bulan = 1;
         $indexBulan = 0;
         $i=0;

         while($i < 12) {

            if ($this->showLosstimeCountByYear($year)[$i] == NULL) {
               array_push($data_arr, 0);
            } else { 
               
               if ($bulan == $this->showLosstimeCountByYear($year)[$indexBulan]['month']) {
                  array_push($data_arr, $this->showLosstimeCountByYear($year)[$indexBulan]['jumlah_menit']);
                  $indexBulan++;
               }
            }

            $i++;
            $bulan++;
         }
         return $data_arr;
      }



      /**
       * Running Text
       */

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