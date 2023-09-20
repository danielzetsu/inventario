# inventario
sistema de inventario


1.- Obtener una copia del repositorio y agregarlo a tu servidor, ya sea en tu máquina local o en un servidor en línea.

2.- Modificar si se está trabajando con apache En el php.ini habilitar los siguientes controladores
	extension=pdo_odbc
	extension=pdo_pgsql
	extension=pgsql

3.- Configura la base de datos incluida en el archivo .env en la ruta inventario\.env
	Se sugiere de esta forma 

	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=3232
	DB_DATABASE=inventario
	DB_USERNAME=postgres
	DB_PASSWORD=123456789
	
4.- colocar en marcha el servidor de laravel desde la terminal con el siguiente comando
	php artisan serve


5.- ejecutar las migraciones
	php artisan migrate
	que se encuentra en 
	(inventario\database\migrations\2023_09_20_134008_create_productos_tables.php)
	Acceder dirección:  http://localhost/inventio/



