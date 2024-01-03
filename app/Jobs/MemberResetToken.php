<?php

namespace App\Jobs;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class MemberResetToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $member ;
    public $token ;


    public function __construct(Member $member, $token)
    {
        $this->member = $member;
        $this->token = $token ;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->member['email'])
        ->send(new ForgetPasswordMail($this->token));
    }
}
