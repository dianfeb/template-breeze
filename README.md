buat project laravel terlebih dahulu
composer require laravel/laravel nama-project

install breeze
composer require laravel/breeze --dev

jalankan perintah
php artisan install:breeze

selanjutnya jalan perintah
npm run install dan npm run dev

setting dataabse
dan migrate

install spatie untuk permission
 composer require spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"