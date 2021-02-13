# Telegram User Suscriptions.

Mostrar y crear notas en multiples modelos en laravel.

## Instalación

```bash
composer require chondal/model-notes
```
Luego ejecutar migraciones para migrar la tabla "telegram_users"

## Preparar Archivos del proyecto
1) En App\Http\Middleware\VerifyCsrfToken; agregar la ruta "telegram"
```bash
protected $except = [
        '/telegram',
];
```

2) En config/services.php
```bash
'telegram-bot-api' => [
    'token' => env('TELEGRAM_BOT_TOKEN', 'TU_TOKEN'),
    'name' => env('TELEGRAM_BOT_NAME', 'NOMBREDELBOT'),
],
```

3) Agregar al modelo user el Trait hasTelegram e importar la libreria
```bash
use Notifiable, HasTelegram;
```



## Como usarlo (en desarrollo)



## Capturas

![alt text](https://res.cloudinary.com/dchaozfok/image/upload/v1597698708/imhr9vtnikwkmtmbxtsd.png)

## Contributing
Las solicitudes de extracción son bienvenidas. Para cambios importantes, abra un problema primero para discutir qué le gustaría cambiar.

## License
[MIT](https://choosealicense.com/licenses/mit/)