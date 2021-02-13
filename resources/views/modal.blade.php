<!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modelTelegram">
  <img width="20px" src="{{ config('telegram-user.icon') }}" alt=""> Notificaciones Telegram
</button>

<!-- Modal -->
<div class="modal fade" id="modelTelegram" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>Escaneá el código con tu celular para hablar con el Bot y te llegarán las notificaciones en tu celular.</p>
                        <div class="m-2">
                            {{ TelegramUserSuscription::qr(200) }}
                        </div>
                        <p>También podes acceder desde este link.</p>
                        <a href="{{ TelegramUserSuscription::link() }}"> <img src="{{ config('telegram-user.icon') }}" alt=""> ACCEDER</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>