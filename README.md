<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> 

# Consumo de Api de la Nasa - DOKI

 _Este proyecto corresponde alDesafío técnico Chilepasajes - Laravel. Este proyecto fue hecho en PHP 8.4.1 con Laravel 11 _
 
### Pre-requisitos 
_Que cosas necesitas para instalar el software y como instalarlas?_
Se necesita tener un IDE compatible con PHP versión 8.1 o superior y el framework laravel 11 en particular en este proyecto se ocupo el IDE Visual Studio. Se necesita tener instalado postman para hacer las pruebas de peticiones a la  API de la nasa. Además se debe tener instalado composer (revisar en internet requisitos para instalar laravel 11 para más detalle), una vbez que se clona el proyecto se debe modificar el archivo .env  donde se debe crear las variables de entorno : NASA_API_KEY = api_key_generada_nasa  con una key que se genera en la pagina https://api.nasa.gov/  se debe ir donde dice Generate API Key y llenar el formulario con los datos que pide y llegara al mail una clave que se genera ya que se necesita esta key para conectarse al proyecto DOKI de la nasa. Luergo se debe crear otra variable  de entorno llamada NASA_URL= https://api.nasa.gov/DONKI/ para evitar copiar la url en cada metodo o clase del código. Se necesita instalar una vez que se clona el proyecto la libreria guzzlehttp/guzzle para facilitar la conexion a API externas y hacer más dinamico el proceso de consumo de las api. 

### Instalación 
1. Una vez que se descarga el proyecto se debe ejecutar en el IDE  para ello en una consola  se debe ejecutar el comando php artisan serve para echar a correr el proyecto
2. Se debe ir a postman  y crear una coleccion o importar el archivo .json que se entregue con este repositorio
3. Se debe indicar un request GET para hacer la petición de que muestre todos los instrumentos usados por DONKI en todas las mediciones de todas las rutas de la API disponibles. Lo antewrior se basa en lo que indicaba los requisitos de la prueba técnica.
4. Para evitar hacer redundancia al repetir codigo de la direccón se debe crear una variable global (se puede poner el nombre que se quiera) en mi caso se llama {{base_url}}=localhost:8000/api
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
  
- 0[Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
