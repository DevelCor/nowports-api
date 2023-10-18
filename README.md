# Nombre del Proyecto

Este es un proyecto web desarrollado en Laravel. A continuación, se describen los pasos necesarios para configurar y ejecutar este proyecto de manera local.

## Requisitos Previos

- [PHP](https://www.php.net/) >= 7.x
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) o cualquier otro sistema de gestión de bases de datos que prefieras.

## Configuración

1. **Clona el repositorio**

    ```bash
    git clone https://github.com/DevelCor/nowports-api.git
    cd nowports-api
    ```

2. **Instala las dependencias de Composer**

    ```bash
    composer install
    ```

3. **Copia el archivo de configuración**

    ```bash
    cp .env.example .env (lo puedes editar desde tu editor de codigo)
    ```

4. **Genera una nueva clave de aplicación**

    ```bash
    php artisan key:generate
    ```

5. **Configura la base de datos**

   Abre el archivo `.env` y configura la conexión a tu base de datos. Puedes establecer los siguientes valores:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario_de_la_base_de_datos
    DB_PASSWORD=contraseña_de_la_base_de_datos
    ```

6. **Migra la base de datos**

   Ejecuta el siguiente comando para crear las tablas en la base de datos:

    ```bash
    php artisan migrate
    ```

7. **Inicia el servidor de desarrollo**

   Ejecuta el siguiente comando para iniciar el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

   El proyecto estará disponible en `http://localhost:8000`.

## Personalización

Puedes personalizar este proyecto según tus necesidades, creando rutas, controladores, modelos y vistas adicionales. Además, puedes modificar la hoja de estilos y la apariencia general para que se vea atractivo.

## Contribuciones

Si deseas contribuir a este proyecto, no dudes en enviar pull requests o informar sobre problemas encontrados.

## Licencia

Este proyecto está bajo la Licencia [MIT](LICENSE).
