<?php

namespace App\Jobs;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendResetToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     public $admin;
     public $token;
    public function __construct(Admin $admin , $token)
    {
        $this->token =$token;
        $this->admin =$admin;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->admin['email'])
        ->send(new ForgetPasswordMail($this->token));
    }
}
