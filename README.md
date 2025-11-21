# Instalasi Wordpress
1. Menginstall file zip Wordpress dari website resminya.
2. Membuka XAMPP dan menyalakan Mysql serta Apache
3. Mengesktrak file zip yang telah didownload, lalu dipindah ke folder htdocs XAMPP
4. Mengubah nama folder tadi
5. Membuka localhost/phpmyadmin untuk membuat database baru
6. Membuka localhost/mywordpress untuk melakukan instalasi
7. Membuka localhost/mywordpress/wp-admin untuk membuka dashborad Wordpress

# Menjalankan Projek 
1. Membuka dashboard Wordpress, lalu ke Appearance, menginstall theme Twenty saventeen
2. Membuat folder baru dengan nama twentyseventeen-child 
3. Membuat file baru yang berisi code untuk projek
4. Folder berisi file : functions.php, template-event-page.php, style.css, Readme.md
5. Mengaktifkan theme twentyseventeen-child di Appearance
6. Kembali ke dashborad, pergi ke page, lalu add new page
7. Pergi ke Settings, lalu Permalinks, klik save changes
8. Menuliskan judul page misalnya "Event Page", di bagian sidebar ada Tamplate, pilih Even Page yang telah dibuat tadi
9. Klik Publish
10. Membuka halaman view yang sudah di publish tadi, akan memunculkan 3 event card yang telah di buat dengan file functions.php, template-event-page.php, style.css
11. Menggunakan sorting harga dengan dropdown "Sort by Price" dengan memilih opsi 
"Murah → Mahal" atau "Mahal → Murah" akan mengirimkan parameter ke URL, memicu logika sorting php, dan menampilkan daftar event yang sudah terurut berdasarkan harga
12. Menampilkan total event, "Total Events : 3" akan ditampilkan di bawah Event Card, dihasilkan oleh shortcode yang dipanggil di template-event-page.php

# Penjelasan Singkat Logic
1. Data Dummy Statis: Data event (nama, tanggal, lokasi, harga) didefinisikan secara hardcode dalam PHP array di template-event-page.php
2. Logic Sorting : Di dalam template-event-page.php, terdapat logika PHP yang memeriksa apakah ada parameter URL ?sort= (misalnya ?sort=low-high). Jika ada, fungsi PHP usort() digunakan untuk mengurutkan array $events berdasarkan kolom event_price sebelum card ditampilkan.
3. Shortcode Counter : File functions.php berisi shortcode [simple_event_count]. Fungsi ini membaca array $events yang sama, menghitung jumlah elemennya (count($events)), dan mengembalikan string "Total Events: 3"



