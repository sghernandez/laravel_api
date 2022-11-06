
# Laravel 9 - API & Front - JQuery

API con laravel 9 utilizando Sanctum para proteger las rutas.



## Instalación


```bash
  - en laravel/api => composer install
  - definir el acceso a la base de datos en el .env
  - php artisan migrate:fresh --seed
```

## Rutas - con Postman o alguno similar


```bash
// Login
Route::post('login', [LoginController::class, 'login']);

// Rutas protegidas
Route::group(['middleware' => ['auth:sanctum']], function()
{
    Route::get('empleados', [EmpleadoController::class, 'index']);
    Route::post('empleado', [EmpleadoController::class, 'store']);
    Route::get('empleado/{id}', [EmpleadoController::class, 'show']);
    Route::put('empleado/{id}', [EmpleadoController::class, 'update']); 
    
    Route::get('logout', [LoginController::class, 'logout']);
});

```

## Json para crear un empleado


```bash
{
    "nombres": "Empleado",
    "apellidos": "de Prueba",
    "genero": "F",
    "dni": "1123456700"
}
```
    
## Consultas desde el Front    

```bash
 - Hacer login y logout
 - consultar empleados
 - pendiente: guardar y editar empleados
```

## Screenshots

![Laravel API](https://drive.google.com/uc?export=view&id=1u766dkjB5yLWDvzYVPMTD4-UREAkkptv)

