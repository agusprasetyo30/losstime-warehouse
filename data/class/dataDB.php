<?php
   include "dataArray.php";

   class dataDB extends dataArray {

      // Constructor koneksi
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
       * 
       */

      // Login pengguna
      function login($post)
      {
         $id_karyawan = htmlspecialchars($post['id_anggota']);
         $password = mysqli_real_escape_string($this->koneksi, $post['password']);

         $query_id = "SELECT * FROM users WHERE id_karyawan = '$id_karyawan' ";

         $cek_id = mysqli_query($this->koneksi, $query_id);

         // mengecek apakah username ada atau tidak
         if (mysqli_num_rows($cek_id) == 1) {
            $data = mysqli_fetch_assoc($cek_id);
            
            
            // mencocokan password input dengan password yang ada di DB
            if (password_verify($password, $data['password'])) {
               
               // jika status penggunannya aktif
               if ($data['status'] == 'AKTIF') {
                  // Menginisialisasi SESSION
                  $_SESSION['id'] = $data['id'];
                  $_SESSION['nama'] = $data['nama'];
                  $_SESSION['id_karyawan'] = $data['id_karyawan'];
                  $_SESSION['password'] = $data['password'];
                  $_SESSION['akses'] = $data['akses'];
               
                  return "success"; // jika benar maka akan mereturn nilai true

               } else { // jika statusnya TIDAK AKTIF
                  return "non";
               }

            } else { // jika password salah
               return "fail";
            }

         } else { // jika username & password salah
            return "fail";
         }
      }

      // logout pengguna
      function logout($session)
      {
         if ($session != NULL) {
            session_start();
            session_destroy();
            session_unset();
            
            return true;

         } else {
            return false;
         }
      }
      
      // ubah password pengguna berdasakan inputan dan + ID Peggunaa
      function changePassword($post, $id)
      {
         $password_lama = $post['password_lama'];
         $password_baru = $post['password_baru'];
         $konfirmasi_password = $post['konfirmasi_password'];

         // query mencari data berdasarkan ID users
         $query_cek = "SELECT * FROM users WHERE id = '$id' ";

         $cek_id = mysqli_query($this->koneksi, $query_cek);

         // jika ID ditemukan/sesuai
         if (mysqli_num_rows($cek_id) > 0) {
            $data = mysqli_fetch_assoc($cek_id);

            // mengecek apakah password lama sesuai dengan password yang ada di DB
            if (password_verify($password_lama, $data['password'])) {
               
               if ($password_baru == $konfirmasi_password) {
                  $password_baru = password_hash($post['password_baru'], PASSWORD_DEFAULT);
                  
                  $query_update = "UPDATE users SET password = '$password_baru' WHERE id = '$id'";
                  mysqli_query($this->koneksi, $query_update);
                  
                  return true;
               }

            } else { // jika tidak sesuai
               return false;
            }

         } else { // jika ID tidak ditemukan
            return false;
         }
      }
      
      // fungsi untuk menambahkan pengguna
      function addUser($post) 
      {
         $nama = htmlspecialchars($post['nama']);
         $id_karyawan = htmlspecialchars($post['id_karyawan']);

         $password = mysqli_real_escape_string($this->koneksi, $post['password']);
         $password2 = mysqli_real_escape_string($this->koneksi, $post['confirm_password']);

         //mengecek ID Karyawan
         $query = mysqli_query($this->koneksi, "SELECT id_karyawan FROM users WHERE id_karyawan='$id_karyawan' ");
         
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
         $query = "INSERT INTO users VALUES(NULL, '$nama', '$id_karyawan', '$password', '$waktu')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      /**
       * Losstime
       * 
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
         $waktu_buat = $post['waktu'];

         // Query tambah data
         $query = "INSERT INTO losstime VALUES(NULL, '$line', '$shift', '$jam_kerja', '$masalah', '$jml_losstime', '$id_user', NULL, '$waktu_buat', NULL)";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      // mengedit data losstime
      function editLosstime($id)
      {
         // TODO : MENGEDIT DATA LOSSTIME
      }

      // Menghapus data losstime
      function deleteLosstime($id)
      {
         // TODO : MENGHAPUS DATA LOSSTIME
      }

      // menampilkan losstime berdasarkan tanggal hari ini
      function showLosstimeByDay($dayDate) 
      {
         $query = "SELECT l.*, u.nama, u.id_karyawan FROM losstime l INNER JOIN users u ON l.created_by = u.id 
            WHERE DATE(l.created_at) = '$dayDate' 
            ORDER BY l.created_at DESC ";
                  
         return $this->query($query);
      }

      // menghitung total losstime berdasarkan tanggal hari ini
      function countLosstimeByDay($dayDate) 
      {
         $query = "SELECT sum(jml_losstime) as jumlah FROM losstime WHERE DATE(created_at) = '$dayDate' GROUP BY DATE(created_at) ";
         
         // Jika data didalam database masih kosong/NULL maka akan mereturn nilai 0
         return $this->query($query)[0]['jumlah'] == NULL ? 0 : $this->query($query)[0]['jumlah'];
      }
      
      // menampilkan losstime berdasarkan bulan
      function showLosstimeByMonth() 
      {
         $query = "SELECT count(line) as jumlah_line, sum(jml_losstime) AS jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime 
            GROUP BY MONTH(created_at), YEAR(created_at) ORDER BY created_at DESC";
         
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
         $query = "SELECT l.*, u.id, u.nama, u.id_karyawan FROM losstime l INNER JOIN users u ON l.created_by = u.id 
            WHERE MONTH(l.created_at) = '$month' AND YEAR(l.created_at) = '$year' 
            ORDER BY l.created_at DESC ";

         return $this->query($query);
      }

      // Menghitung jumlah losstime pada tahun tertentu
      function countLosstimeByYear($year)
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY YEAR(created_at) ";

         // Jika data didalam database masih kosong/NULL maka akan mereturn nilai 0
         return $this->query($query)[0]['jumlah_menit'] == NULL ? 0 : $this->query($query)[0]['jumlah_menit'];
      }

      // menampilkan jumlah menit berdasarkan tahun
      function showLosstimeCountByYear($year)
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY MONTH(created_at) ";

         return $this->query($query);
      }

      // data array losstime yang terdapat pada grafik dimana ditampilkan berdasarkan tahun sekarang
      function getDataGrafikLosstime($year)
      {
         $data_arr = [];
         $bulan = 1;
         $indexBulan = 0;
         $i=0;

         for ($i=0; $i < 12 ; $i++) { 

            // Jika data bulan masih kosong/belum diisi
            if ($this->showLosstimeCountByYear($year)[$indexBulan] == NULL) {
               array_push($data_arr, 0);
            } 
            
            // jika sudah terdapat data pada bulan tersebut
            if ($this->showLosstimeCountByYear($year)[$indexBulan] != NULL) {
               if ($this->showLosstimeCountByYear($year)[$indexBulan]['month'] == $bulan) { // jika data di database sesuai dengan bulan
                  array_push($data_arr, $this->showLosstimeCountByYear($year)[$indexBulan]['jumlah_menit']); // memasukan data ke array untuk menampilkan ke grafik
                  $indexBulan++;

               } else {
                  array_push($data_arr, 0);
               }
            }

            $bulan++;
         }

         return $data_arr;
      }

      // menghitung dan menampilkan jumlah losstime per minggu dalam periode bulan tertentu
      function showLosstimeByWeek($month, $year)
      {
         $query = "SELECT WEEK(created_at, 1) - WEEK(created_at - INTERVAL DAY(created_at) - 1 DAY, 1) + 1 as week, sum(jml_losstime) as jumlah_menit FROM losstime 
            WHERE MONTH(created_at) = '$month' AND YEAR(created_at) = '$year' 
            GROUP BY WEEK(created_at, 1) - WEEK(created_at - INTERVAL DAY(created_at) - 1 DAY, 1) + 1
            ORDER BY jumlah_menit DESC";
         
         return $this->query($query);
      }

      // mengambil data minggu pada data query yang akan digunakan pada grafik
      function getWeekLosstimeByMonthYear($month, $year)
      {
         $data_minggu = [];
         $data_query = $this->showLosstimeByWeek($month, $year); // mengambil data dari fungsi

         for ($i=0; $i < count($data_query); $i++) {
            array_push($data_minggu, 'Minggu ' .$data_query[$i]['week']); // memasukan data minggu ke array $data_minggu
         }

         // merubah array menjadi JSON dan mereturn data array tersebut
         return json_encode($data_minggu, JSON_NUMERIC_CHECK);
      }
      
      // mengambil data jumlah losstime minggu pada data query yang akan digunakan pada grafik
      function getJumlahLosstimeByMonthYear($month, $year)
      {
         $data_losstime = [];
         $data_query = $this->showLosstimeByWeek($month, $year); // mengambil data dari fungsi

         for ($i=0; $i < count($data_query); $i++) {
            array_push($data_losstime, $data_query[$i]['jumlah_menit']);// memasukan data minggu ke array $data_losstime
         }

         // merubah array menjadi JSON dan mereturn data array tersebut
         return json_encode($data_losstime, JSON_NUMERIC_CHECK);
      }

      /**
       * Running Text
       * 
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