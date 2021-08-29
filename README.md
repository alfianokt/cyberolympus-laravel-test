# Cyberolympus Laravel Test

# Installasi

-   clone repository ini
-   install packages dengan perintah

```bash
composer install
```

-   salin file `.env.example` menjadi `.env` atau dengan perintah

```bash
cp .env.example .env
```

-   buat key aplikasi laravel dengan perintah

```bash
php artisan key:generate
```

-   buka file `.env` dan lakukan perubah konfigurasi, yaitu :

```bash
...
APP_URL=http://localhost # ubah dengan url aplikasi
...
DB_HOST=127.0.0.1   # ubah sesuai host database
DB_PORT=3306        # ubah sesuai port database
DB_DATABASE=laravel # ubah sesuai nama database
DB_USERNAME=root    # ubah sesuai username database
DB_PASSWORD=        # ubah sesuai password database
```
