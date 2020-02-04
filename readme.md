# Warehouse Losstime Visualitation


## Requirement
- PHP 7.4.1
- Apache/2.4.29 (Ubuntu)
- Versi Server: 5.7.28-0ubuntu0.18.04.4 - (Ubuntu)

## Template
- adminLTE [ <a href="https://adminlte.io">https://adminlte.io/</a> ] 

## Package
- Bootstrap 4 [ <a href="https://getbootstrap.com">https://getbootstrap.com</a> ]
- ChartJS [ <a href="https://www.chartjs.org/">https://www.chartjs.org</a> ]
- Select2 [ <a href="https://select2.org">https://select2.org</a> ]
- DataTables [ <a href="https://datatables.net">https://datatables.net</a> ]
- Sweetalert2 [ <a href="https://sweetalert2.github.io">https://sweetalert2.github.io/</a> ]

## Screenshot
1. Dashboard Awal
<img src="./ss.png" style="text-align: center; width: 100%">
<br>
2. Dashboard Admin
<img src="./ss2.png" style="text-align: center; width: 100%">

## Documentation

### Alur Kerja program
1. Ketika pertama kali menjalankan program, halaman pertama yang muncul adalah halaman <b>DASHBOARD</b>, halaman dashboard ini menampilkan data losstime perbulan berupa grafik dan data-data seperti jumlah losstime harian, jumlah losstime bulanan, dan jumlah losstime tahunan
2. Jika ingin mengisi data losstime maka yang harus dilakukan adalah login terlebih dahulu
> untuk akun pengguna yang bisa mendaftarkan adalah admin/foreman dari warehouse
3. Setelah berhasil login setelah itu adalah diarahkan sesuai dengan hak akses masing-masing, didalam program terdapat 2 hak akses yaitu : 
   - Admin dan Foreman
      1. Manajemen Pengguna (Tambah, Edit pengguna)
      2. Manajemen Losstime (Edit, Hapus losstime)
      3. Manajemen Line (Tambah, Edit, Hapus Line)
      4. Manajemen Masalah Line (Tambah, Edit, Hapus Masalah Line)
      5. Manajemen Running Text (Tambah, Edit, Hapus Running Text)
      6. Input Data Losstime
      7. Melihat report dan visualisasi losstime (Harian, Mingguan, Bulanan, Tahunan)
      8. Ubah Password Pengguna 

   - Operator
      1. Input Data Losstime
      2. Melihat report dan visualisasi losstime (Harian, Mingguan, Bulanan, Tahunan)
      3. Ubah Password Pengguna