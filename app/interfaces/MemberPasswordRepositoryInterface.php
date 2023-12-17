<?php

namespace App\interfaces;


interface MemberPasswordRepositoryInterface{
    public function resetPassword();
    public function forgotPassword();

}

