<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> 

# Consumo de Api de la Nasa - DONKI

 _Este proyecto corresponde al Desafío técnico Chilepasajes - Laravel. Este proyecto fue hecho en PHP 8.4.1 con Laravel 11 _
 
### Pre-requisitos 
_Que cosas necesitas para instalar el software y como instalarlas?_

Se necesita tener un IDE compatible con PHP versión 8.1 o superior y el framework laravel 11 en particular en este proyecto se ocupo el IDE Visual Studio. Se necesita tener instalado postman para hacer las pruebas de peticiones a la  API de la nasa. Además se debe tener instalado composer (revisar en internet requisitos para instalar laravel 11 para más detalle), una vez que se clona el proyecto se debe modificar el archivo .env  donde se debe crear las variables de entorno : NASA_API_KEY = api_key_generada_nasa  con una key que se genera en la pagina https://api.nasa.gov/  se debe ir donde dice Generate API Key y llenar el formulario con los datos que pide y llegara al mail una clave que se genera ya que se necesita esta key para conectarse al proyecto DOKI de la nasa. Luergo se debe crear otra variable  de entorno llamada NASA_URL= https://api.nasa.gov/DONKI/ para evitar copiar la url en cada metodo o clase del código. Se necesita instalar una vez que se clona el proyecto la libreria guzzlehttp/guzzle para facilitar la conexion a API externas y hacer más dinamico el proceso de consumo de las api. 

### Instalación 
1. Una vez que se descarga el proyecto se debe ejecutar en el IDE  para ello en una consola  se debe ejecutar el comando php artisan serve para echar a correr el proyecto
2. Se debe ir a postman  y crear una coleccion o importar el archivo .json que se entregue con este repositorio
3. Se debe indicar un request GET para hacer la petición de que muestre todos los instrumentos usados por DONKI en todas las mediciones de todas las rutas de la API disponibles. Lo anterior se basa en lo que indicaba los requisitos de la prueba técnica.
4. Para evitar hacer redundancia al repetir codigo de la direccón, se debe crear una variable global (se puede poner el nombre que se quiera) en mi caso se llama {{base_url}}=localhost:8000/api
5. En la url se debe poner la siguiente dirección: {{base_url_nasa}}nasa/intrumentos donde se obtendrá el siguiente resultado:

           {
               "instruments": [
        {
            "name_instrument": "ACE: MAG"
        },
        {
            "name_instrument": "ACE: SWEPAM"
        },
        {
            "name_instrument": "DSCOVR: PLASMAG"
        },
        {
            "name_instrument": "STEREO A: IMPACT"
        },
        {
            "name_instrument": "STEREO A: PLASTIC"
        },
        {
            "name_instrument": "STEREO A: SECCHI/COR2"
        },
        {
            "name_instrument": "SOHO: LASCO/C2"
        },
        {
            "name_instrument": "SOHO: LASCO/C3"
        }
           ]
           }
  6. Para obtener todas las IDS de actividades existentes sin mostrar todo lo que tiene que ver con la fecha se debe ir a postman e indicar que se quiere obtener un request tipo GET  y colocar en la url la siguiente dirección: {{base_url_nasa}}nasa/activityIDs obteniendo el siguiente resultado:

                 {
               
                     "activityIDs": [
                        {
                            "activity_id": "IPS-001"
                        },
                        {
                            "activity_id": "CME-001"
                        }
                    ]
                  }
7. Para obtener porcentaje de uso de cada una de los instrumentos respecto del total de apariciones, en número decimal en postman se debe poner request en GET  y colocar en la url la siguiente dirección: {{base_url_nasa}}nasa/instrument-porcentaje donde se obtiene el siguiente resultado:

        {
               "instruments_use": [
        {
            "instrument": "ACE: MAG",
            "porcentaje": 0.01
        },
        {
            "instrument": "ACE: SWEPAM",
            "porcentaje": 0.01
        },
        {
            "instrument": "DSCOVR: PLASMAG",
            "porcentaje": 0.01
        },
        {
            "instrument": "STEREO A: IMPACT",
            "porcentaje": 0.01
        },
        {
            "instrument": "STEREO A: PLASTIC",
            "porcentaje": 0.01
        },
        {
            "instrument": "STEREO A: SECCHI/COR2",
            "porcentaje": 0.25
        },
        {
            "instrument": "SOHO: LASCO/C2",
            "porcentaje": 0.37
        },
        {
            "instrument": "SOHO: LASCO/C3",
            "porcentaje": 0.34
        }
        ]
                  }
   No hay que registrarse como usuario ya que es una api pública  solo hay que tener cuidado en crear la variable de entorno de la key ya que es requerimiento escencial para conectarse a la  api del proyecto 
  doki de la nasa.

## Construido con 
 _Herramientas utilizadas_
 *[Visual Studio Code](https://code.visualstudio.com/) - El IDE que fue usado para programar el código
 *[Laravel](https://laravel.com/) - El framework Laravel versión 11.
 *[php](https://www.php.net/) - El lenguaje es php versión 8.4.1.
 *[guzzlehttp/guzzle](https://docs.guzzlephp.org/en/stable/) - Libreria que se usa para facilitar el consumo de la api. 
 

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.
ver a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
