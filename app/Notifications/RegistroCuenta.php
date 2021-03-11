<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class RegistroCuenta extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
        $usuario=$notifiable->usuario->usuario;
        $password=$notifiable->contraseña;
        
        return (new MailMessage)
                ->subject(Lang::get("Nuevo Registro Usuario ".session('empresa.denominacion')))
                ->line(new HtmlString(Lang::get('Recibió este correo electrónico porque se ha realizado correctamente el registro de su cuenta.<br><br>Sus Datos de acceso son:<br><br>Usuario: '.$usuario.'<br>Contraseña: '.$password)))
                ->action(Lang::get('ENTRAR'), url(config('app.url')));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
