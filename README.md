# Aksesmu Product Management

Aplikasi CRUD produk untuk Technical Test Web Development. Project ini menggunakan Laravel 12 (memenuhi requirement minimal Laravel 11), Blade, Tailwind CSS, dan database relasional.

## Requirement yang dipenuhi

- Tabel `products` berisi `id`, `name` maksimal 100 karakter, `description` nullable, `price` decimal(10,2), `stock` default 0, serta timestamps.
- List produk berbentuk tabel dengan pencarian dan pagination.
- Tambah dan edit produk menggunakan validasi server-side.
- Hapus produk menggunakan CSRF, method `DELETE`, dan konfirmasi browser.
- Seeder menyediakan lima contoh produk.
- Feature test mencakup list, create, validation, update, dan delete.
- UI responsif dibuat dengan Blade dan Tailwind CSS.

## Tech stack

- PHP 8.2+
- Laravel 12
- Blade
- Tailwind CSS 3
- Vite 8 dan Laravel Vite Plugin 3
- MySQL atau PostgreSQL
- PHPUnit

## Struktur tabel products

| Kolom | Tipe | Aturan |
| --- | --- | --- |
| `id` | BIGINT | Primary key, auto increment |
| `name` | VARCHAR(100) | Wajib |
| `description` | TEXT | Opsional |
| `price` | DECIMAL(10,2) | Wajib, minimal 0 |
| `stock` | INTEGER | Default 0, minimal 0 |
| `created_at` | TIMESTAMP | Otomatis |
| `updated_at` | TIMESTAMP | Otomatis |

## Instalasi

```bash
git clone https://github.com/sultanfaturahman/Aksesmu-Technical-Test.git
cd Aksesmu-Technical-Test
composer install
npm ci
```

Salin environment file dan buat application key:

```bash
cp .env.example .env
php artisan key:generate
```

Pada Windows PowerShell, gunakan `Copy-Item .env.example .env` sebagai pengganti `cp`.

### MySQL

Gunakan `.env.mysql.example` sebagai referensi, lalu buat database:

```sql
CREATE DATABASE aksesmu_product
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

### PostgreSQL

Gunakan `.env.pgsql.example` sebagai referensi dan pastikan database `aksesmu_product` sudah tersedia.

Jalankan migration, seeder, dan build asset:

```bash
php artisan migrate --seed
npm run build
```

Jalankan aplikasi:

```bash
php artisan serve
```

Buka `http://127.0.0.1:8000`. Untuk pengembangan frontend dengan hot reload, jalankan `npm run dev` pada terminal kedua.

## Menjalankan test

```bash
php artisan test
composer validate --no-check-publish
npm audit
npm run build
```

## Route utama

| Method | URL | Fungsi |
| --- | --- | --- |
| GET | `/products` | List dan pencarian produk |
| GET | `/products/create` | Form tambah produk |
| POST | `/products` | Menyimpan produk |
| GET | `/products/{product}/edit` | Form edit produk |
| PUT/PATCH | `/products/{product}` | Memperbarui produk |
| DELETE | `/products/{product}` | Menghapus produk |

## Struktur kode penting

```text
app/
  Http/Controllers/ProductController.php
  Http/Requests/ProductRequest.php
  Models/Product.php
database/
  migrations/*_create_products_table.php
  seeders/ProductSeeder.php
resources/
  css/app.css
  views/layouts/app.blade.php
  views/products/*.blade.php
routes/web.php
tests/Feature/ProductCrudTest.php
```

## Keputusan teknis

- Form Request memusatkan validasi create dan update.
- Resource controller dan route model binding menjaga alur CRUD konsisten.
- `$fillable` membatasi field yang dapat diisi secara mass assignment.
- Cast `decimal:2` mempertahankan format harga yang konsisten.
- Seeder dibuat idempotent menggunakan `firstOrCreate`.
- Query pencarian dipertahankan ketika berpindah halaman.

## Data contoh

Seeder menyediakan Beras, Minyak Goreng, Gula Pasir, Mi Instan, dan Teh Celup.
