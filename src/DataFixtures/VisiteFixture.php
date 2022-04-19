<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Visite;

class VisiteFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Commencez par créer une variable $faker qui va recevoir un objet généré par la fabrique de la classe

        $faker = Factory::create('fr_FR');
        
        // boucle qui va ajouter 100 enregistrements
        for($k=0 ;$k<100; $k++) {
            $visite = new Visite();
            $visite->setVille($faker->city)
                    ->setPays($faker->country)
                    ->setDatecreation($faker->dateTime)
                    ->setTempmin($faker->numberBetween(-20,10))
                    ->setTempmax($faker->numberBetween(10,40))
                    ->setAvis($faker->sentences(4,true))
                    ->setNote($faker->numberBetween(2,20));
            
            // enregistrement de l'objet
            $manager->persist($visite);
                    
        }

        $manager->flush();
    }
}
