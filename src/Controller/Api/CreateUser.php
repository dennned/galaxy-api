<?php

namespace App\Controller\Api;

use App\Manager\UserManager;

class CreateUser
{
    /** @var UserManager $userManager */
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function __invoke($data)
    {
        return $this->userManager->createUser($data);
    }

}
