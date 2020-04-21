## Instrucciones de instalación
1. Tener instalado Laragon o las herramientas necesarias para ejecutar un proyecto en Laravel 7.
2. Crear una base de datos, de preferencia con el mismo nombre del proyecto.
3. Configurar, los siguientes parámetros, en el archivo **.env**:
- Url en la que se ejecuta la aplicación
    > APP_URL=http://localhost

- Nombre de la base de datos
    > DB_DATABASE=rsabackend
        
- Usuario de acceso a la base de datos
    > DB_USERNAME=root
        
- Password de acceso a la base de datos
    > DB_PASSWORD=
        
4. Abrir la consola en el directorio del proyecto y ejecutar los siguientes comandos:
- `composer install`
- `php artisan key:generate`
- `php artisan migrate:fresh --seed`
- `php artisan passport:install`
5. Buscar en la tabla **oauth_clients** de la base de datos, el cliente que tenga como nombre *(name)* **Laravel Password Grant Client** y configurar, los siguientes parámetro en el archivo .env :
- Id de cliente
    > OAUTH_PWD_GRANT_CLIENT_ID=[id]

- Clave secreta del cliente 
    > OAUTH_PWD_GRANT_CLIENT_SECRET=[secret]

## Ejemplos para usar las rutas
**/api/login - POST**
```javascript
headers: { 'Content-Type': 'application/json' },
body: {
    'username': 'jfarmas' || 'jfarmas@email.com',  
    'password': 'jfarmas'  
}
```# rsabackend
