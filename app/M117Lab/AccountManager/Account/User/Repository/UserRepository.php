<?php
namespace M117Lab\AccountManager\Account\User\Repositories;
use Entries\Account\User;

class UserRepository
{
    protected $Repository;


    public function __construct(User $user)
    {
        $this->Repository = $user;
    }
}
