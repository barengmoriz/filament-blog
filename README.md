## Laravel Filament Blog

Belajar membuat Blog menggunakan Laravel Filament.
Dibuat oleh Moriz.

Youtube Bareng Moriz : https://www.youtube.com/@barengmoriz.

## Kebutuhan

-   PHP >= 8.2
-   Composer
-   NodeJS

## Fitur

### 1. Category

-   Tambah Data Category
-   Edit Data Category
-   Hapus Data Category

### 2. Tag

-   Tambah Data Tag
-   Edit Data Tag
-   Hapus Data Tag

### 3. Post

-   Tambah Data Post
-   Edit Data Post
-   Hapus Data Post
-   Status Post

### 4. User

-   Tambah Data User
-   Edit Data User
-   Hapus Data User
-   Atur Role
-   Atur Permission

### 5. Permission

-   Tambah Data Permission
-   Edit Data Permission
-   Hapus Data Permission

### 6. Role

-   Tambah Data Role
-   Edit Data Role
-   Hapus Data Role

## Perbarui Aplikasi

Catatan : Jika sudah melakukan unduh dan atur aplikasi, bisa langsung perbarui aplikasi saja tanpa instal dari awal.

Lakukan perintah berikut pada aplikasi yang sudah ada.

```bash
git pull
composer install
npm install
php artisan migrate
```

Lakukan perintah berikut untuk mengisi data peran dan hak akses secara otomatis.

Catatan : jika dijalankan ulang, maka data peran dan hak akses akan disetel ulang ke data awal.

```
php artisan db:seed
```

Lakukan perintah berikut untuk membuat pengguna.

```
php artisan make:filament-user
```

Lakukan perintah berikut untuk memberikan peran Super Admin pada pengguna.

```
php artisan app:set-superadmin
```

Kamu juga bisa lakukan perintah berikut, ubah `emailsaya@gmail.com` dengan email yang akan dijadikan sebagai Super Admin.

```
php artisan app:set-superadmin emailsaya@gmail.com
```

## Instalasi Aplikasi

### Unduh aplikasi

```bash
git clone https://github.com/barengmoriz/filament-blog
```

Catatan : Jika kalian menggunakan Laravel Herd, lakukan `git clone` pada `Herd paths` yang telah kalian atur.

### Instal paket PHP dan NodeJS

```bash
cd filament-blog
composer install
npm install
```

### Salin file `.env.example` dan ubah nama menjadi `.env`

```bash
cp .env.example .env
```

### Membuat kunci aplikasi

```bash
php artisan key:generate
```

Sesuaikan konfigurasi pada `.env` sesuai kebutuhan.

### Menjalankan migrasi database

```bash
php artisan migrate
```

### Mengatur peran Super Admin pada pengguna

Lakukan perintah berikut untuk mengisi data peran dan hak akses secara otomatis.

Catatan : jika dijalankan ulang, maka data peran dan hak akses akan disetel ulang ke data awal.

```
php artisan db:seed
```

Lakukan perintah berikut untuk memberikan peran Super Admin pada pengguna.

```
php artisan app:set-superadmin
```

Kamu juga bisa lakukan perintah berikut, ubah `emailsaya@gmail.com` dengan email yang akan dijadikan sebagai Super Admin.

```
php artisan app:set-superadmin emailsaya@gmail.com
```

### Menjalankan aplikasi

```bash
php artisan serve
```

Catatan : abaikan perintah di atas jika kalian menggunakan Laravel Herd, bisa langsung buka di browser http://filament-blog.test.

## Tautan Pendukung

-   Laravel : https://laravel.com
-   Laravel Filament :https://filamentphp.com
-   TailwindCSS : https://tailwindcss.com
-   Laravel Permission : https://spatie.be/docs/laravel-permission
