# Objetivo
Este es un "micro framework" php el cual fue diseñado para comprender el funcionamiento de los frameworks y sus estructuras.

El principio fundamental de este framework se basa en el "No" uso de librerias, apostando a que el desarrollador conozca por completo, la herramienta que está usando. Bajo esta misma lógica, el núcleo del framework se encuentra totalmente expuesto en la ruta principal del mismo, se usan rutas claras y con nombres coherentes a su función.

Si bien es un proyecto de aprendizaje, es totalmente funcional y de amplio uso, podemos realizar un proyecto web tradicional o una REST API.

## Consola
El framework tiene un sistema automatizado, para la creación de componentes internos como controlladores, modelos, vistas, etc. Tambien puede levantar un servidor para 
hacer pruebas, entre otras muchas funciones.

#### Init
Una vez copiado el proyecto, deberá inicializarlo para crear los archivos por defecto utilizando el siguiente comando.
#### ~$php console init

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

#### ~$php console make:layout nombre_de_mi_layout
Crea el layout solicitado para extender en una vista.

## Autoload
El software admite el uso de dependencias instaladas con composer, para ello deberemos configurar el archivo ./config/env.php e instalar la aplicación correspondiente usando el metodo de composer:
	ej: composer require spipu/html2pdf
 
 Esto generará una carpeta llamada vendor, la cual incluye un autoload para cargar todas las dependencias que instalemos allí. Luego de la instalación deberemos correr
 el comando 
#### ~$composer dump 

 Este comando actualizará la configuración de dependencias en el autoload

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

### View
El framework cuenta con un sistema que facilita el llamado a la vista usando la función render::view(), esta función tambien se encarga de pasarle
variables a la vista mediante el segundo parametro. Veamos un ejemplo:

	use core\render;

	class principalController{

		public function index(){
			render::view('principal/index.php',['controllerName'=>'principal']);
		}
	}

Para recibir estos parametros podemos ir a la carpeta de vistas y abrir el archivo ./src/views/principal/index.php ej:

	<?= self::layout('main.php')?>

	<?= html()?>

	<?= body()?>

		<h1><?= $controllerName?></h1>

		<div>
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit quasi modi et nemo quam sed ea facere omnis explicabo nesciunt?.       
		</div>

	<?= close()?>


           
Aquí podemos ver el uso del parámetro pasado anteriormente controllerName como si fuera una simple variable precargada.

En el ejemplo anterior podemos ver las funciones self::layout() donde especificamos el layout el cual extenderemos a nuestra vista, tambien podemos notar las funciones
html(), body() y close(), estas delimitan la hoja de vista e insertan los componentes del layout del cual extendimos anteriormente.
Entre las funciones html() y body() podemos insertar código html el cual se cargará en la cabecera del documento, osea lo que corresponde
entre las etiquetas 
	
	<header> Mis etiquetas cargadas en la vista </header>

ejemplo:

	<?= self::layout('main.php')?>

	<?= html()?>
		<link rel="stylesheet" href="<?= asset('css/custom_items.css') ?>" />
	<?= body()?>

		<h1><?= $controllerName?></h1>

		<div>
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit quasi modi et nemo quam sed ea facere omnis explicabo nesciunt?.       
		</div>

	<?= close()?>

Tambien podremos pasar parámetros a la función html() para modificar datos de posicionamiento en el header de la plantilla. 
Estos datos pueden ser:

	html([
		"lang"=>"es",
		"sitename"=>"My Site Name",
		"title"=>"My Site",
		"type"=>'website',
		"description"=>"Micro framework",
		"keywords"=>"framework micro microframework",
		"supportEmail"=>"support@my_site.com"
	])


### Json
De la misma forma que contamos con un renderizador de vistas tambien podemos usar un sistema preestablecido para renderizar salidas del tipo json.
 Para iniciar el renderizado json debemos llamar a render::json(). Dentro de este llamado podemos establecer el número de respuesta, el cual será enviado en la cabeceras y en el body de la respuesta, por ejemplo render::json(404). 
 Por defecto la función json() devolverá una cabecera 200, en el caso de no especificar ninguna.
Para finalizar el renderizado devemos llamar a la función de salida ->out(); quedando de la siguiente manera. render::json(404)->out();
 Si queremos enviar contenido en el body del mensaje podemos cargarlo dentro de la función de salida, por ejemplo: 
render::json()->out(\[ "misdatos"=>\[MiData...] ]);
 
 Tambien se puede agregar un mensaje, usando la función ->message('Mi mensaje'), veamos los siguientes ejemplos con todas las funciones incorporadas.

Ejemplos:

##### Ejemplo1: 

	render::json(403)
		->message('No tiene permiso para usar esta API','e')
		->out();



	Resultado de la página:
	
	{
	"status":403
	"message":"No tiene permiso para usar esta API",
	"content":false,	
	}
			




##### Ejemplo2: 

	render::json()
		->message('Estos son los datos de búsqueda')
		->out( $MySql_example );

	
	Resultado de la página:
	
		{
		"status": 200,
		"message":"Estos son los datos de búsqueda",
		"content":[
			{"name":"David","age":35,"job":"Developer"},
			{"name":"Rodrigo","age":18,"job":"seller"}
			]
		}