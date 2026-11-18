<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Category;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                "title" => "Blade Runner",
                "description" => "Un chasseur de replicant qui tombe amoureux d'un robot...",
                "actors" => [
                    [
                        "firstname"=>"Harrison",
                        "lastname"=>"Ford",
                    ],
                    [
                        "firstname"=>"Sean",
                        "lastname"=>"Young",
                    ],
                ],
                "category" => "science-fiction",
            ],
            [
                "title" => "The drama",
                "description" => "Un couple qui se déchire...",
                "actors" => [
                    [
                        "firstname"=>"Robert",
                        "lastname"=>"Pattinson",
                    ],
                    [
                        "firstname"=>"Zendaya",
                        "lastname"=>"Coleman",
                    ],
                ],
                "category" => "drame",
            ],
            [
                "title" => "Hope",
                "description" => "Un petit village attaqué par des extra-terrestres...",
                "actors" => [
                    [
                        "firstname"=>"Jung",
                        "lastname"=>"Ho-yeon",
                    ],
                    [
                        "firstname"=>"Jo",
                        "lastname"=>"In-sung",
                    ],
                ],
                "category" => "action",
            ],
        ];
        
        foreach($data as $row) {
            $movie = new Movie();
            $movie->setTitle($row["title"]);
            $movie->setDescription($row["description"]);

            foreach($row["actors"] as $actorData) {
                //Récupérer l'acteur qui a ce prénoim et ce nom
                $actor = $this->getReference($actorData["firstname"]."-".$actorData["lastname"], Actor::class);

                $movie->addActor($actor);
            }

            //Récupérer la catégorie
            $category = $this->getReference($row["category"], Category::class);
            $movie->setCategory($category);

            $manager->persist($movie);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
