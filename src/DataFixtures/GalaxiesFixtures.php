<?php

namespace App\DataFixtures;

use App\Entity\Galaxies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GalaxiesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrayGalaxies = [
            [
                'name' => 'Alpha',
                'desc' => 'Alpha galaxy description'
            ],
            [
                'name' => 'Beta',
                'desc' => 'Beta galaxy description'
            ],
            [
                'name' => 'Gamma',
                'desc' => 'Gamma galaxy description'
            ]
        ];

        foreach ($arrayGalaxies as $galaxy) {
            $galaxyItem = new Galaxies();
            $galaxyItem->setName($galaxy['name']);
            $galaxyItem->setDescription($galaxy['desc']);
            $manager->persist($galaxyItem);
            $manager->flush();
        }
    }
}
