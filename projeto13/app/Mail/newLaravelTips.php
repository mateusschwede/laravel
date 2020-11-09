<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class newLaravelTips extends Mailable {
    use Queueable, SerializesModels;

    private $user;

    public function __construct(\stdClass $user) { //No ideal, informava-se um Model User $user
        $this->user = $user;
    }

    public function build() {
        $this->subject('Assunto do email');
        $this->to($this->user->email,$this->user->name); //Geralmente parâmetros de um Model, neste caso criou-se objeto de teste para informar parâmetros
        /*return $this->view('mail.newLaravelTips',[
            'user' => $this->user
        ]);*/
        return $this->markdown('mail.newLaravelTips',[
            'user' => $this->user
        ]);
    }
}