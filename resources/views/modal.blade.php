<!-- Button trigger modal -->
<button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#modelTelegram">
  <img width="15px" src="{{ config('telegram-user.icon') }}" alt=""> Notificaciones Telegram
</button>

<!-- Modal -->
<div class="modal fade" id="modelTelegram" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Cómo recibo notificaciones en Telegram?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        Hay tres posibles formas de suscribirse a las notificaciones.
                    </div>
                    <div class="col-md-12">
                        <p>1) Escaneá el código con tu celular para hablar con el Bot y te llegarán las notificaciones en tu celular.</p>
                        <div class="m-2 text-center">
                            {{ TelegramUserSuscription::qr(100) }}
                        </div>
                        <p>2) Si estas en tu celular ó tenes telegram en tu pc hace click acá.</p>
                        <div class="text-center">
                            <a target="_blank" class="btn btn-link" href="{{ TelegramUserSuscription::link() }}"> <img width="20px" src="{{ config('telegram-user.icon') }}" alt=""> ACCEDER AHORA</a>
                        </div>
                        <p>
                            3) Busca el bot <b>{{ config('services.telegram-bot-api.name') }}</b> inicialo e ingresá el codigo acá:
                            <form action="{{ route('telegram.suscription') }}" method="post">
                                @csrf
                                <div class="form-group">
                                  <label for="">Codigo de Verificación.</label>
                                  <input required type="text" class="form-control" name="user_code" id="" placeholder="Ingresá el numero que te indica el bot">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block form-submit">Verificar</button>

                                <button type="button" class="btn btn-primary btn-block btn-outline disabled form-loader d-none pull-right">
                                    <i class="fa fa-cog fa-spin"></i> Verificando...
                                </button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-submit')
                .parents('form')
                .on('submit', function(event){
                    event.preventDefault();

                    $(event.target)
                        .find('.form-submit')
                        .addClass('d-none');

                    $(event.target)
                        .find('.form-loader')
                        .removeClass('d-none');

                    this.submit();
                });
        });
    </script>
@endpush

