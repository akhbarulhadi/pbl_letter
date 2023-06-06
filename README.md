<p align="center"><img src="https://github.com/akhbarulhadi/pbl_letter/blob/main/public/img/LetteR2.png" width="150" alt="Laravel Logo"></a></p>

<p style="font-size: 20px;" align="center">
LetteR
</p>

## Information

Aplikasi permintaan surat menyurat (LetteR) adalah sebuah aplikasi yang bertujuan untuk memudahkan mahasiswa dalam mengajukan permintaan pembuatan surat menyurat kepada pihak yang berwenang (Tata Usaha). Dalam aplikasi ini, pengguna dapat mengisi formulir permintaan surat menyurat secara online dan mengirimkannya kepada pihak yang dituju.

Keuntungan menggunakan aplikasi permintaan surat menyurat (LetteR) adalah memudahkan mahasiswa dalam mengajukan permintaan tanpa harus datang ke kantor Tata Usaha. Selain itu, aplikasi ini juga dapat mempercepat proses pembuatan surat menyurat dan mengurangi kesalahan pengisian data yang mungkin terjadi.


## License

PBL_LetteR

## Cara pakai Git

git init,
git add nama_file/*,
git commit -m "percobaan" (untuk comment/deskripsi),
git push -u origin (untuk dorong file dari directory lokal laptop ke repository github),
git pull origin main (untuk ambil dari repo github ke directory lokal).

## untuk ambil repo github ke lokal directory:

1.git clone link github
2.setelah itu composer install/composer update
3.env.example copas dan jadikan .env
4.php artisan key:generate
5.php artisan migrate
6.php artisan serve