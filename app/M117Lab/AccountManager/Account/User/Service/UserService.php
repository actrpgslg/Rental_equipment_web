<?php
namespace M117Lab\AccountManager\Services;
use M117Lab\AccountManager\Account\User\Repositories\UserRepository;

class UserService
{
    /** @var Mailer */
    private $Repository;

    /**
     * EmailService constructor.
     * @param Mailer $mail
     */
    public function __construct(UserRepository $repository)
    {
        $this->Repository = $repository;
    }

}
