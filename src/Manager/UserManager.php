<?php

namespace App\Manager;

use App\Entity\User;
use App\Services\PasswordService;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserManager
 * @package App\Manager
 */
class UserManager
{
    /** @var PasswordService $passwordService*/
    protected $passwordService;

    /** @var UserRepository $userRepository*/
    protected $userRepository;

    /**@var EntityManagerInterface $em*/
    protected $em;

    public function __construct(
        PasswordService $passwordService,
        UserRepository $userRepository,
        EntityManagerInterface $em)
    {
        $this->passwordService = $passwordService;
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    /**
     * @param string $email
     * @return mixed|null
     */
    public function checkEmail(string $email)
    {
        if ($user = $this->userRepository->findOneByEmail($email)) {
            return $user;
        }

        return null;
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function createUser(User $user): JsonResponse
    {
        if ($this->checkEmail($user->getEmail())) {
            return new JsonResponse(
                ['error' => 'This e-mail has exist!'],
                Response::HTTP_NOT_FOUND
            );
        }

        $password = $this->passwordService->encodePassword($user, $user->getPassword());

        $user->setPassword($password);
        $user->setUsername($user->getEmail());

        $this->em->persist($user);
        $this->em->flush();

        return new JsonResponse(
            [
              'message' => 'User was created'
            ],
            Response::HTTP_OK
        );
    }

}
