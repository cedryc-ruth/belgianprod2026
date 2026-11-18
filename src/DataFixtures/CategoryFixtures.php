<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            ["name" => "comédie"],
            ["name" => "action"],
            ["name" => "drame"],
            ["name" => "science-fiction"],
            ["name" => "romance"],
            ["name" => "horreur"],
        ];

        foreach($data as $row) {
            $category = new Category();

            $category->setName($row["name"]);

            $manager->persist($category);

            //Enregistrer une référence à cette catégorie
            $this->addReference($row["name"], $category);
        }

        $manager->flush();
    }
}
