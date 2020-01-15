<?php
   // Data-data statik yang ditampung didalam array
   class dataArray {
      
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

      // Mengambil data line
      function getLine()
      {
         $line = [
            "1C", "2A"," 2A (PRADO)", "TC", "JP04", "2C", "TC SBS", "3B", "4A", "4B", "5B", 
            "5C", "6C", "6C", "7C", "9A", "10A", "10C", "JP 03", "11C", "12B", "13C", "15A",
            "15C", "17C", "18B", "19A", "19C", "20B", "23B", "24B", "25B", "27B"
         ];

         return $line;
      }

      // Mengambil data masalah
      function getMasalah()
      {
         $masalah = [
            "[9A] PART TERCAMPUR",
            "[9B] SALAH SUPPLY DARI WAREHOUSE",
            "[9C] TUNGGU MATERIAL DARI WAREHOUSE",
            "[9D] TUNGGU TERMINAL",
            "[9E] TUNGGU TUBE/COT/VO DARI WAREHOUSE",
            "[9F] TUNGGU WIRE"
         ];

         return $masalah;
      }
   }
?>