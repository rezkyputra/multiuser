1. Menggunakan Template Bootstrap (ok)
2. Terdapat fitur Login dengan 2 privilege (admin dan user)
3. Login admin mempunyai fitur CRUD User, yang mana user yang dibuat oleh admin bisa login ke aplikasi (ok)
4. Login user mempunyai fitur View dan Edit Profile dirinya termasuk untuk ganti password 
5. Buatlah sebaik mungkin (informasi user kalau bisa terdapat fitur upload foto)
6. Tambahkan informasi expected sallary kamu di aplikasi yang telah kamu buat
7. Buatlah file readme.md yang berisi informasi cara menginstal aplikasi yang telah kamu buat (ok)
8. Upload aplikasi kamu di github (ok)

Cara menjalankan project

1. Clone/download dulu projectnya
2. Install depedency dengan cara "composer install" pada cmd
3. copy semua file .env.example ke .env dengan cara "cp .env.example .env" pada cmd
4. ubah setting database pada .env
5. Buat database sesuai setting .env
6. "php artisan key:generate" pada cmd untuk mendapatkan APP_KEY
7. "php artisan migrate" pada cmd untuk memberi table pada database
8. Jalankan projectnya dengan cara "php artisan serve" pada cmd

Nb : di pc harus terinstall composer
