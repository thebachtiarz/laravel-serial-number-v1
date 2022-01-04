# laravel-serial-number-v1
### A Serial Number Middleware for Laravel Project v1

-------

### Installation
- composer config (only if you have access)
```bash
composer config repositories.thebachtiarz/laravel-serial-number-v1 git git@github.com:thebachtiarz/laravel-serial-number-v1.git
```

- install repository
```bash
composer require thebachtiarz/laravel-serial-number-v1
```

- register the Middleware into -> **app/Http/Kernel.php**
```bash
protected $routeMiddleware = [
    ...
    'apiKeyService' => \TheBachtiarz\SerialNumber\Middleware\ApiKeyAccessMiddleware::class,
    
];
```

- register the REST API into -> **app/Providers/RouteServiceProvider.php**
```bash
Route::prefix('thebachtiarz')
    ->middleware(['api'])
    ->namespace($this->namespace)
    ->group(tbsnrouteapi());
```

-------
### Feature

> sek males nulis cak :v
-------
