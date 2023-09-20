# inventario
sistema de inventario

php artisan make:migration create_productos_tables
(inventario\database\migrations\2023_09_20_134008_create_productos_tables.php)
php artisan migrate

si se está trabajando con apache En el php.ini hablilitar los siguientes controladores
extension=pdo_odbc
extension=pdo_pgsql
extension=pgsql

ejecutra la siguinete migracion 
php artisan migrate


