# Telegram User Suscriptions.

Captar el id de chat de un usuario para luego poder usarlo en notificaciones, en esta documentación no se explica como crear un bot de telegram ya que creo que hay mucha info al respecto en internet.

## Instalación

```bash
composer require chondal/model-notes
```
Luego ejecutar migraciones para migrar la tabla "telegram_users"

## Preparar Archivos del proyecto
1) En App\Http\Middleware\VerifyCsrfToken; agregar la ruta "telegram", recordá tambien configurar el webhook para que todo llegue a esta ruta la cual seria: https:://tuURL.com/telegram.
```bash
protected $except = [
        '/telegram',
];
```

2) En config/services.php agregar estas lineas y poner los datos de tu bot de telegram.
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

4) Correr migraciones para que llegue correctamente.

## Como usarlo
En la pantalla de perfil del usuario se puede mostrar un modal utilizando lo siguiente donde queres que aparezca el botón:
{{ TelegramUserSuscription::modal() }}

Si solo queres mostrar el link:

{{ TelegramUserSuscription::modal() }}

Si queres mostrar un QR:

{{ TelegramUserSuscription::modal() }}

## Publicar Vistas y archivo de configuración.
Se pueden publicar las vistas escribiendo en consola:
```bash
php artisan vendor:publish
```


## Capturas

![alt text](https://res.cloudinary.com/dchaozfok/image/upload/v1597698708/imhr9vtnikwkmtmbxtsd.png)

## Contributing
Este paquete aún se encuentra en desarrollo, se acepta cualquier tipo de sugerencia.
Las solicitudes de extracción son bienvenidas. Para cambios importantes, abra un problema primero para discutir qué le gustaría cambiar.

## License
[MIT](https://choosealicense.com/licenses/mit/)