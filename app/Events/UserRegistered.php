<?php

namespace App\Events;

use App\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered {

    use Dispatchable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $zip_code;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, string $zip_code)
    {
        $this->user = $user;
        $this->zip_code = $zip_code;
    }

}
