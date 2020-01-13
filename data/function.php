<?php

   // Menerjemahkan bulan menjadi bahasa indonesia
   function getBulan($data_bulan)
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

    
   function getLine()
   {
      $line = [
         "AB1",
         "AB2",
         "AB3",
         "AB4",
         "AB5",
         "AB6",
         "AB7",
         "AB8",
         "AB9",
         "AB10",
         "AB11",
         "AB12",
         "AB13",
      ];

      return $line;
   }

   function getMasalah()
   {
      $masalah = [
         "Terlambat suplay",
         "Ada yang salah saat pengiriman 01",
         "Ada yang salah saat pengiriman 02",
         "Ada yang salah saat pengiriman 03",
      ];

      return $masalah;
   }
?>