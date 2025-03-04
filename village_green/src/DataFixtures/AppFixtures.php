<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categorie();
        $c1->setNom('Guitares');
        $manager->persist($c1);

        $sc1 = new SousCategorie();
        $sc1->setNom('Electriques');
        // $sc1->setCategorie($c1);
        $c1->addSousCategory($sc1);
        $manager->persist($sc1);

        $p1 = new Produit();
        $p1->setNom('Fender Stratocaster');
        $p1->setSousCategorie($sc1);
        $manager->persist($p1);


        $sc2 = new SousCategorie();
        $sc2->setNom('Classiques');
        $c1->addSousCategory($sc2);
        $manager->persist($sc2);

        $c2 = new Categorie();
        $c2->setNom('Claviers');
        $manager->persist($c2);

        $c3 = new Categorie();
        $c3->setNom('Percussions');
        $manager->persist($c3);

        $manager->flush();
    }
}
