<?php
   // Data-data statik yang ditampung didalam array
   class dataStatis {
      
      /**
       * Konstruktor Koneksi
       */
      function __construct()
      {
         $hostname = "localhost";
         $username = "root";
         $password = "";
         $database = "warehouse";

         $this->koneksi = mysqli_connect($hostname, $username, $password, $database) or trigger_error(mysqli_error($this->koneksi), E_USER_NOTICE);
      }

      /**
       * fungsi untuk menampilkan data select dengan cara memasukan query ke dalam parameter
       *
       * @param [String] $query
       * @return array
       */
      protected function query($query) : array
      {
         $result = mysqli_query($this->koneksi, $query);
         $rows = [];
         while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
         }
         return $rows;
      }


      /**
       * Menerjemahkan bulan menjadi bahasa indonesia
       *
       * @param [int] $data_bulan
       * @return string
       */
      function getBulan($data_bulan) : string
      {
         switch ($data_bulan) {
            case '1':
               $bulan = "Januari";
               break;
            case '2':
               $bulan = "Pebruari";
               break;
            case '3':
               $bulan = "Maret";
               break;
            case '4':
               $bulan = "April";
               break;
            case '5':
               $bulan = "Mei";
               break;
            case '6':
               $bulan = "Juni";
               break;
            case '7':
               $bulan = "Juli";
               break;
            case '8':
               $bulan = "Agustus";
               break;
            case '9':
               $bulan = "September";
               break;
            case '10':
               $bulan = "Oktober";
               break;
            case '11':
               $bulan = "Nopember";
               break;
            case '12':
               $bulan = "Desember";
               break;
         }

         return $bulan;
      }
   }
?>