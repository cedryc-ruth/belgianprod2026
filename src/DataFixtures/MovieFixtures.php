<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                "title" => "Blade Runner",
                "description" => "Un chasseur de replicant qui tombe amoureux d'un robot...",
            ],
            [
                "title" => "The drama",
                "description" => "Un couple qui se déchire...",
            ],
            [
                "title" => "Hope",
                "description" => "Un petit village attaqué par des extra-terrestres...",
            ],
        ];
        
        foreach($data as $row) {
            $movie = new Movie();
            $movie->setTitle($row["title"]);
            $movie->setDescription($row["description"]);
            
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
