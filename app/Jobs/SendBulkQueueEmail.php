<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendBulkQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public $timeout = 7200; // 2 ho

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $data = User::all();
        $input['subject'] = $this->details['subject'];
        /* $data = array(
            'haroonniaz96@gmail.com',
            'haroonniaz97@gmail.com',
         );*/
        $data = 'haroonniaz96@gmail.com';
        /*$input['email'] = 'haroonniaz96@gmail.com';
        \Mail::send('emails.test', [], function ($message) use ($input) {
            $message->to($input['email'], $input['name'])
                ->subject($input['subject']);
        });*/
        \Illuminate\Support\Facades\Mail::to('haroonniaz96@gmail.com')->send(new SendMailable());
    }
}
