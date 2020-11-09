<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class newLaravelTips implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3; //3 tentativas de execução
    private $user;

    public function __construct(\stdClass $user) {
        $this->user = $user;
    }

    public function handle() {
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\newLaravelTips($this->user));
    }
}