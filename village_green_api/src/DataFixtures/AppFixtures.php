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
        $c1->setImage("test.png");
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

        $p2 = new Produit();
        $p2->setNom('Fender Stratocaster2');
        $p2->setSousCategorie($sc1);
        $manager->persist($p2);

        $p3 = new Produit();
        $p3->setNom('Fender Stratocaster3');
        $p3->setSousCategorie($sc1);
        $manager->persist($p3);

        $p4 = new Produit();
        $p4->setNom('Fender Stratocaster4');
        $p4->setSousCategorie($sc1);
        $manager->persist($p4);


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

        $c4 = new Categorie();
        $c4->setNom('Categorie 4');
        $manager->persist($c4);

        $c5 = new Categorie();
        $c5->setNom('Percussions');
        $manager->persist($c5);

        $c6 = new Categorie();
        $c6->setNom('Percussions');
        $manager->persist($c6);

        $c7 = new Categorie();
        $c7->setNom('Percussions');
        $manager->persist($c7);

        $c8 = new Categorie();
        $c8->setNom('Percussions');
        $manager->persist($c8);

        $manager->flush();
    }
}
