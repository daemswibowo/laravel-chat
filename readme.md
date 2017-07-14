# Tentang Aplikasi Ini
Ini adalah contoh aplikasi chatting menggunakan Framework Laravel + VueJS + Laravel Echo Server.
Aplikasi ini menggunakan fitur Broadcasting Event yang ada pada Laravel (https://laravel.com/docs/5.4/broadcasting). Selamat belajar dan selamat mencoba :)

# Cara Instal
Penting! Pastikan Anda sudah menginstall NodeJS (https://docs.npmjs.com/cli/install) dan Laravel Echo Server (https://github.com/tlaverdure/laravel-echo-server).
Jika ke duanya sudah ada di komputer anda selanjutnya clone repositori ini dan ketik perintah berikut di terminal :

```bash
$ 	cd laravel-event-broadcasting
$ 	npm install
$ 	composer install
```

## Konfigurasi AppServiceProvider
Untuk beberapa alasan laravel mengharuskan setingan ini agar bisa melakukan migrasi database untuk versi mysql lawas. Pertama buka file `AppServiceProvider` di direktori `app/Providers/AppServiceProvider.php` dan tambahkan beberapa kode berikut:

```php
<?php
//...
use Illuminate\Support\Facades\Schema; //tambahkan line ini
//...

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // tambahkan line ini di antara fungsi boot()
    }
    //...
}
```

## Konfigurasi database
Silahkan ubah settingan database di file `.env` yang ini ga perlu saya jelasin yah hehe.

## Migrasi database & jalankan aplikasi di browser
Migrasi database :
```bash
$ 	php artisan migrate
```
Ketik perintah ini untuk dapat mengakses aplikasi di browser :
```bash
$ 	php artisan serve
```
Buka terminal baru untuk menjalankan server Laravel Echo (http:localhost:6001) :
```bash
$  	laravel-echo-server start
```

Jalankan aplikasi ini di browser dengan cara akses ke alamat http://localhost:8000
sebelumnya lakukan registrasi akun dulu untuk login ya. Terimakasih :)

