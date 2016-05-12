# Trabajo Fin de Grado 2016
## AdminLaComunidad

Es un gestor online para el mantenimiento de una comunidad de vecinos, donde podrás dar de alta a los propietarios,
las propiedades de la que consta la comunidad, hacer ingresos, los gastos, mandar correos a los propietarios.

## Implementación

Esta aplicación está implementada con Laravel 5.2, Bootstrap 3 y jQuery

# Instalación

1.- Realizar un clone dentro de tu servidor local.

2.- Instalar todas las dependecias necesarias de la aplicación.

    composer update

3.- Crear el archivo .env en la raíz y configurar en nombre de la BBDD.
    Este archivo puedes crearlo a partir del .env.example

4.- Crear las tablas con:

    php artisan migrate:refresh --seed
