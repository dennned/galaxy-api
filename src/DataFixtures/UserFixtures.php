<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$username, $password, $email]) {
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);

            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function getUserData(): array
    {
        return [
            ['jane_admin', 'kitten', 'jane_admin@symfony.com'],
            ['tom_admin', 'kitten', 'tom_admin@symfony.com'],
            ['john_user', 'kitten', 'john_user@symfony.com'],
        ];
    }
}
