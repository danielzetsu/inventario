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


1.- Obtener una copia del repositorio y agregarlo a tu servidor, ya sea en tu máquina local o en un servidor en línea.
2.- Configura la base de datos incluida en el archivo inventario/schema.sql, tienes la opción de hacerlo a través de 
	Workbench o mediante comandos en la terminal
3.- Modificar si se está trabajando con apache En el php.ini hablilitar los siguientes controladores
	extension=pdo_odbc
	extension=pdo_pgsql
	extension=pgsql
4.- colocar en marcha el servidor de laravel desde la terminal con el siguinte comando
	php artisan serve


4.- ejecutar las migraciones
	php artisan migrate
	Acceder direccion http://localhost/inventio/



