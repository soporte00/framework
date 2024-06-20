### Autoload

El software admite el uso de dependencias instaladas con composer, para ello deberemos configurar el archivo ./config/env.php e instalar la aplicación correspondiente usando el metodo de composer:
	ej: composer require spipu/html2pdf
 
 Esto generará una carpeta llamada vendor, la cual incluye un autoload para cargar todas las dependencias que instalemos allí. Luego de la instalación deberemos correr
 el comando 
#### ~$composer dump 

 Este comando actualizará la configuración de dependencias en el autoload


### Consola

#### -> MAKE

#### ~$php console make:mvc nombre_de_mi_modulo
Esto nos creará en la carpeta ./src y luego en las respectivas subcarpetas ./src/models, ./src/controllers, ./src/views los archivos necesarios para 
nuestro código MVC.

#### ~$php console make:vc nombre_de_mi_modulo
Esto creará la vista y el controlador correspondientes.

#### ~$php console make:controller nombre_de_mi_modulo
Crea el controlador solicitado.

#### ~$php console make:model nombre_de_mi_modulo
Crea el modelo solicitado.
