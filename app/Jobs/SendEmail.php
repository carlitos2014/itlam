<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Log;
use Mail;

class SendEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $subject;
    private $body;
    private $to;
    private $cc;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $body, array $to, array $cc=[])
    {
        $this->subject = $subject;
        $this->body    = $body;
        $this->to      = $to;
        $this->cc      = $cc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $body = $this->body;
        $subject = $this->subject;
        $view = 'layouts.emails.email';

        //if ($this->attempts() < 3) {
        try{
            Mail::send($view, compact('body','subject'), function($message) {

                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME')); //Se define en .ENV

                //Asunto
                $message->subject($this->subject);
                
                $message->to($this->to);
                $this->msg = 'Correo enviado a '.implode(', ', $this->to);

                //Copia del correo al jefe del creador del ticket
                if(count($this->cc)>0){
                	$message->cc($this->cc);
                    $this->msg .= ' con copia a '.implode(', ', $this->cc);
                }
            });

            Log::info( $this->msg );
            if( count(Mail::failures()) > 0 )
               Log::error("Error enviando correos: ". implode(',', Mail::failures()));

        } catch(\Exception $e){
            $this->logError('Error enviando correo: '.$e->getMessage());
            Log::error( $e );
        }
    }
}
