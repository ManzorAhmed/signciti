<?php

namespace App\Http\Controllers;

use App\Jobs\SendBulkQueueEmail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class EmailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('haroonniaz96@gmail.com')->send(new SendMailable());
        echo 'email sent';
    }

    public function sendBulkMail(Request $request)
    {
        $details = [
            'subject' => 'Weekly Notification'
        ];

        // send all mail in the queue.
        $job = (new SendBulkQueueEmail($details));
        dispatch($job);

        echo "Bulk mail send successfully in the background...";
    }

    public function queueWork()
    {
        Artisan::call('queue:work');
        return "Queue Work";
    }

    public function queueStop()
    {
        Artisan::call('queue:stop');
        return "Queue Pause";
    }

}
