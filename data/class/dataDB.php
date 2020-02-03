<?php
   include "dataStatis.php";

   class dataDB extends dataStatis {

      //  <-- PENGGUNA -->

      /**
       * Login pengguna
       *
       * @param [array] $post
       * @return string
       */
      function login($post) : string
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
               
                  return "success"; // jika benar maka akan mereturn string success

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


      /**
       * logout pengguna
       *
       * @param [type] $session
       * @return bool
       */
      function logout($session) : bool
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
      

      /**
       * ubah password pengguna berdasakan inputan dan + ID Pegnguna
       *
       * @param [array] $post
       * @param [int] $id
       * @return boolean
       */
      function changePassword($post, $id) : bool
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
      
      
      /**
       * fungsi untuk menambahkan pengguna
       *
       * @param [array] $post
       * @return string
       */
      function addUser($post) : string
      {
         $nama = htmlspecialchars($post['nama']);
         $id_karyawan = htmlspecialchars($post['id_karyawan']);
         $akses = $post['akses'];
         $status = 'AKTIF';

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
         $query = "INSERT INTO users VALUES(NULL, '$nama', '$id_karyawan', '$password', '$status', '$akses', '$waktu')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * menampilkan data pada tabel users
       *
       * @param [int] $akses
       * @return array
       */
      function getUsersData($akses = null) : array
      {
         // query untuk menampilkan data keseluruhan
         $query = "SELECT * FROM users WHERE status = 'AKTIF' ORDER BY id ASC";

         // query untuk menampilkan data sesuai dengan akses
         $query_akses = "SELECT * FROM users WHERE akses = '$akses' AND status = 'AKTIF' ORDER BY id ASC";
         
         // query untuk menampilkan data non aktif
         $query_status = "SELECT * FROM users WHERE status = 'NON AKTIF' ORDER BY id ASC";


         if ($akses == null) { // jika tidak memilih akses maka ditampilkan semuanya
            return $this->query($query);
         
         } else { // ditampilkan sesuai akses yg dipilih
            if ($akses == 'NONAKTIF') {
               return $this->query($query_status);

            } else {
               return $this->query($query_akses);
            }
         }
      }

      
      /**
       * menampilkan data user sesuai dengan ID
       *
       * @param [int] $id
       * @return array
       */
      function getUsersDataByID($id) : array
      {
         $query = "SELECT * FROM users WHERE id = '$id'";

         return $this->query($query)[0];
      }


      /**
       * fungsi untuk mengubah data pengguna
       *
       * @param [array] $post
       * @param [int] $id
       * @return boolean
       */
      function updateUsers($post, $id) : bool
      {
         $nama = $post['nama'];
         $id_karyawan = $post['id_karyawan'];
         $akses = $post['akses'];
         $status = $post['status'];

         // Query Update
         $query = "UPDATE users SET nama = '$nama', id_karyawan = '$id_karyawan', 
            akses = '$akses', status = '$status' WHERE id = '$id' ";
         
         // mencari data sesuai dengan ID KARYAWAN
         $query_get_all_user = "SELECT * FROM users WHERE id_karyawan = '$id_karyawan' "; 
         $data_all_user = mysqli_query($this->koneksi, $query_get_all_user);

         // mencari data sesuai dengan ID
         $getDataUser = $this->getUsersDataByID($id);
         
         // Untuk mengecek apakah ada ID karyawan yang sama atau tidak
         if (mysqli_num_rows($data_all_user) > 0) { // jika ID KARYAWAN SAMA

            if ($getDataUser['id_karyawan'] == $id_karyawan) { // di cek apakah id karyawan milik sendiri atau tidak, kalau iya bisa digunakan kembali
               mysqli_query($this->koneksi, $query); // Query update
               return true;

            } else { // jika menginputkan ID KARYAWAN karyawan lain
               return false;
            }   

         } else { // jika tidak ada ID Karyawan yang sama
            mysqli_query($this->koneksi, $query); // Query update
            return true;
         }

         
      }

      //  <-- PENGGUNA -->


      //  <-- LOSSTIME -->

      /**
       * Menambahkan data losstime
       *
       * @param [type] $post
       * @return int
       */
      function addLosstime($post) : int
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


      /**
       * menampilkan losstime berdasarkan ID
       *
       * @param [type] $id
       * @return array
       */
      function getLosstimeByID($id) : array
      {
         $query = "SELECT l.*, u.nama, u.id_karyawan FROM losstime l INNER JOIN users u ON l.created_by = u.id WHERE l.id = '$id'";

         return $this->query($query)[0];
      }


      /**
       * mengedit data losstime
       *
       * @param [type] $post
       * @param [type] $id
       * @return int
       */
      function updateLosstime($post ,$id) : int
      {
         $line = $post['line'];
         $shift = $post['shift'];
         $jam_kerja = $post['jam_kerja'];
         $masalah = $post['masalah'];
         $jml_losstime = $post['jumlah_losstime'];
         $updated_by = $post['updated_by'];
         $updated_at = $post['updated_at'];

         $query = "UPDATE losstime SET 
            line         = '$line',
            shift        = '$shift',
            jam_kerja    = '$jam_kerja',
            masalah      = '$masalah',
            jml_losstime = '$jml_losstime',
            updated_by   = '$updated_by',
            updated_at   = '$updated_at'
         WHERE id = '$id'";

         // echo $query;

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * Menghapus data losstime
       *
       * @param [int] $id
       * @return integer
       */
      function deleteLosstime($id) : int
      {
         $query = "DELETE from losstime WHERE id = '$id'";

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * menampilkan losstime berdasarkan tanggal hari ini
       *
       * @param [date] $dayDate
       * @return array
       */
      function showLosstimeByDay($dayDate) : array
      {
         $query = "SELECT l.*, u.nama, u.id_karyawan FROM losstime l INNER JOIN users u ON l.created_by = u.id 
            WHERE DATE(l.created_at) = '$dayDate' 
            ORDER BY l.created_at DESC ";
                  
         return $this->query($query);
      }


      /**
       * menghitung total losstime berdasarkan tanggal hari ini
       *
       * @param [type] $dayDate
       * @return integer
       */
      function countLosstimeByDay($dayDate) : int
      {
         $query = "SELECT sum(jml_losstime) as jumlah FROM losstime WHERE DATE(created_at) = '$dayDate' GROUP BY DATE(created_at) ";
         
         // Jika data didalam database masih kosong/NULL maka akan mereturn nilai 0
         return $this->query($query)[0]['jumlah'] == NULL ? 0 : $this->query($query)[0]['jumlah'];
      }
      

      /**
       * menampilkan losstime berdasarkan bulan
       *
       * @return array
       */
      function showLosstimeByMonth() : array
      {
         $query = "SELECT count(line) as jumlah_line, sum(jml_losstime) AS jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime 
            GROUP BY MONTH(created_at), YEAR(created_at) ORDER BY created_at DESC";
         
         return $this->query($query);
      }


      /**
       * menampilkan dan sorting losstime berdasarkan bulan dan tahun
       *
       * @param [int] $month
       * @param [int] $year
       * @return array
       */
      function showLosstimeByMonthYear($month, $year) : array
      {
         $query = "SELECT count(line) as jumlah_line, sum(jml_losstime) AS jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime 
            WHERE MONTH(created_at) = '$month' AND YEAR(created_at) = '$year' GROUP BY MONTH(created_at), YEAR(created_at)";

         if ($this->query($query)[0] == null) {
            return [];
         } else {
            return $this->query($query)[0];
         }

      }


      /**
       * menampilkan seua losstime dalam bulan dan tahun tertentu
       *
       * @param [type] $month
       * @param [type] $year
       * @return array
       */
      function showAllLostimeByMonthYear($month, $year) : array
      {
         $query = "SELECT l.*, u.nama, u.id_karyawan FROM losstime l INNER JOIN users u ON l.created_by = u.id 
            WHERE MONTH(l.created_at) = '$month' AND YEAR(l.created_at) = '$year' 
            ORDER BY l.created_at DESC ";

         return $this->query($query);
      }


      /**
       * Menghitung jumlah losstime pada tahun tertentu
       *
       * @param [type] $year
       * @return int
       */
      function countLosstimeByYear($year) : int
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY YEAR(created_at) ";

         // Jika data didalam database masih kosong/NULL maka akan mereturn nilai 0
         return $this->query($query)[0]['jumlah_menit'] == NULL ? 0 : $this->query($query)[0]['jumlah_menit'];
      }


      /**
       * menampilkan jumlah menit berdasarkan tahun
       *
       * @param [type] $year
       * @return array
       */
      function showLosstimeCountByYear($year) : array
      {
         $query = "SELECT sum(jml_losstime) as jumlah_menit, MONTH(created_at) as month, YEAR(created_at) as year FROM losstime WHERE YEAR(created_at) = '$year' GROUP BY MONTH(created_at) ";

         return $this->query($query);
      }


      /**
       * data array losstime yang terdapat pada grafik dimana ditampilkan berdasarkan tahun sekarang
       *
       * @param [type] $year
       * @return array
       */
      function getDataGrafikLosstime($year) : array
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


      /**
       * menghitung dan menampilkan jumlah losstime per minggu dalam periode bulan tertentu
       *
       * @param [type] $month
       * @param [type] $year
       * @return array
       */
      function showLosstimeByWeek($month, $year) : array
      {
         $query = "SELECT WEEK(created_at, 1) - WEEK(created_at - INTERVAL DAY(created_at) - 1 DAY, 1) + 1 as week, sum(jml_losstime) as jumlah_menit FROM losstime 
            WHERE MONTH(created_at) = '$month' AND YEAR(created_at) = '$year' 
            GROUP BY WEEK(created_at, 1) - WEEK(created_at - INTERVAL DAY(created_at) - 1 DAY, 1) + 1
            ORDER BY jumlah_menit DESC";
         
         return $this->query($query);
      }

      /**
       * mengambil data minggu pada data query yang akan digunakan pada grafik
       *
       * @param [type] $month
       * @param [type] $year
       * @return void
       */
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
      

      /**
       * mengambil data jumlah losstime minggu pada data query yang akan digunakan pada grafik
       *
       * @param [type] $month
       * @param [type] $year
       * @return void
       */
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

      //  <-- LOSSTIME -->

      //  <-- RUNNING TEXT -->

      /**
       * menginputkan running text
       *
       * @param [type] $post
       * @return int
       */
      function addRunningText($post) : int
      {
         $text = $post['input_running'];

         // Query tambah data
         $query = "INSERT INTO running_text VALUES(NULL, '$text')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * menampilkan data running text kedalam tabel
       *
       * @return array
       */
      function showListRunningText() : array
      {
         $query = "SELECT * FROM running_text";
         return $this->query($query);
      }


      /**
       * menampilkan data running text berdasarkan ID
       *
       * @param [type] $id
       * @return array
       */
      function showListRunningTextByID($id) : array
      {
         $query = "SELECT * FROM running_text WHERE id = '$id'";
         return $this->query($query)[0];
      }


      /**
       * mengupdate data running text dengan mengambil inputan dan ID
       *
       * @param [type] $post
       * @param [type] $id
       * @return int
       */
      function updateRunningText($post , $id) : int
      {
         $text = $post['input_running'];

         $query = "UPDATE running_text SET text = '$text' WHERE id = '$id' ";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * menghapus data running text
       *
       * @param [type] $id
       * @return int
       */
      function deleteRunningText($id) : int
      {
         $query = "DELETE FROM running_text WHERE id = '$id'";

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }

      //  <-- RUNNING TEXT -->


      // <-- LINE -->

      /**
       * Menambahkan data Line
       *
       * @param [type] $post
       * @return integer
       */
      function addLine($post) : int
      {
         $line = strtoupper($post['line']);
         
         // Query tambah data
         $query = "INSERT INTO line VALUES(NULL, '$line')";
         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * Menampilkan data line
       *
       * @return array
       */
      function getLineDB() : array
      {
         $query = "SELECT * FROM line";

         return $this->query($query);
      }


      /**
       * menampilkan line berdasarkan ID
       *
       * @param [type] $id
       * @return array
       */
      function showLineByID($id) : array
      {
         $query = "SELECT * FROM line WHERE id = '$id'";

         return $this->query($query)[0];
      }


      /**
       * Menghapus data line
       *
       * @param [array] $post
       * @param [int] $id
       * @return integer
       */
      function updateLine($post, $id) : int
      {
         $line = $post['input_line_edit'];

         $query = "UPDATE line SET nama_line = '$line' WHERE id = '$id' ";

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }


      /**
       * Fungsi untuk menghapus data line
       *
       * @param [type] $id
       * @return integer
       */
      function deleteLine($id) : int
      {
         $query = "DELETE FROM line WHERE id = '$id'";

         mysqli_query($this->koneksi, $query);

         return mysqli_affected_rows($this->koneksi);
      }
   }
?>