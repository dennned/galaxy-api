<?php

namespace App\Controller\Api;

use App\Entity\Galaxies;
use Doctrine\ORM\EntityManagerInterface;

class GalaxyLast
{
    /* @var EntityManagerInterface $em */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke()
    {
        return $this->em->getRepository(Galaxies::class)->findAll();
    }

}
