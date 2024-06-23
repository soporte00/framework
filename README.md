# Objetivo
Este es un "micro framework" php el cual te ayudará de una forma rápida a crear una página web con los mínimos requerimientos para un buen funcionamiento.

## Autoload
El software admite el uso de dependencias instaladas con composer, para ello deberemos configurar el archivo ./config/env.php e instalar la aplicación correspondiente usando el metodo de composer:
	ej: composer require spipu/html2pdf
 
 Esto generará una carpeta llamada vendor, la cual incluye un autoload para cargar todas las dependencias que instalemos allí. Luego de la instalación deberemos correr
 el comando 
#### ~$composer dump 

 Este comando actualizará la configuración de dependencias en el autoload


## Consola
Este framework tiene un sistema automatizado, para la creación de componentes internos como controlladores, modelos, vistas, etc. Tambien puede levantar un servidor para 
hacer pruebas, entre otras muchas funciones.

#### -> SERVE
Para iniciar un servidor de prueba puede emplear el siguiente comando:
#### ~$php console serve:local
Este comando iniciará un servidor el cual puede ser accedido solamente desde tu computadora.

#### ~$php console serve:remote
Con este comando puedes iniciar un servidor el cual puede ser accedido desde tu red local.

#### ~$php console serve:local 3500
si le agregamos una bandera luego dle comando original, podemos especificarle al servidor que corra sobre este puerto, de lo contrario intentará iniciarlo en el puerto 8000

#### -> MAKE

#### ~$php console make:mvc nombre_de_mi_modulo
Esto nos creará en la carpeta ./src y luego en las respectivas subcarpetas ./src/models, ./src/controllers, ./src/views los archivos necesarios para 
nuestro código MVC.

#### ~$php console make:vc nombre_de_mi_modulo
Esto creará la vista y el controlador correspondientes.

#### ~$php console make:controller nombre_de_mi_modulo
Crea el controlador solicitado.

#### ~$php console make:apicontroller nombre_de_mi_modulo
Crea el controlador API solicitado.

#### ~$php console make:model nombre_de_mi_modulo
Crea el modelo solicitado.


## API
Este software permite el uso de metodos API. Al hacer una llamada http a la url base del servidor, seguido del parametro api, el sistema entenderá que debe 
manejarse mediante el kernel API.
  
  Ejemplo: https://myhost.com/api/myendpoint

El kenel API llamara a controladores ubicados en la carpeta "src/api_controllers/".

### API Request

Los métodos de cada controlador deberán estar precedidos, en sus nombres, por el verbo correspondiente a utilizar, en mayúscula y unidos mediante un guión bajo. por ejemplo:

	final class myapiController
	{

		use request;

		public function GET_index()
		{
			render::json()->message('My Get_index method')->out();
		}

		public function POST_index()
		{
			$MyJsonData = $this->json();

			<--
				My logic 
			-->

			render::json()->message('My Post_index method')->out();
		}
	}
    

Se recomienda que en todos los controladores API se use el renderizado JSON, el cual se explica en el siguiente punto.


## Render 
El framework cuenta con un sistema que facilita el llamado a la vista usando la función render::view(), esta función tambien se encarga de pasarle
variables a la vista mediante el segundo parametro. Veamos un ejemplo:

	use core\render;

	class principalController{

		public function index(){
			render::view('principal/index.php',['controllerName'=>'principal']);
		}
	}

Para recibir estos parametros podemos ir a la carpeta de vistas y abrir el archivo ./src/views/principal/index.php ej:

            <?=self::html()?>

            <?=self::body()?>

                        <div class="centered-column padd4">
                            <h2> <?=$controllerName?> </h2>
                            <img src="<?= asset('img/icons/tool.svg') ?>" width="50px">
                        </div>

            <?=self::end()?>
           
Aquí podemos ver el uso del parámetro pasado anteriormente controllerName como si fuera una simple variable precargada. Tambien podemos darnos cuenta
del uso de la función asset() la cual nos dará un enlace directo a la carpeta asset la cual se encuentra dentro de la carpeta ./public y donde se deberá 
alojar todo el contenido el cual será llamado luego y no tendrá ninguna restricción de acceso, ej: imágenes, css, js, fonts, etc.

En el ejemplo anterior podemos ver las funciones self::html(), self::body() y self::end(), estas delimitan la hoja de vista para luego insertar una plantilla html.
Entre las funciones self::html() podemos insertar código html el cual se cargará en la cabecera del documento, osea lo que corresponde
entre las etiquetas 
	
	<header> Mis etiquetas cargadas en la vista </header>

ejemplo:


	<?=self::html()?>
				<link rel="stylesheet" href="<?= asset('css/custom_items.css') ?>" />
	<?=self::body()?>

				<div class="centered-column padd4">
					<h2> <?=$controllerName?> </h2>
					<img src="<?= asset('img/icons/tool.svg') ?>" width="50px">
				</div>

	<?=self::end()?>

Tambien podremos pasar parámetros a la función self::html() para modificar datos de posicionamiento en el header de la plantilla. 
Estos datos pueden ser:

	self::html([
			"lang" => 'en_EN',
			"title" => 'Mi sitio web',
			"type" => 'website',
			"description" => 'This is a small framework very light and versatile',
			"keywords" => 'Micro FrameWork small versatile mi sitio web',
			"url" => 'https://mi-url-custom/',
	])