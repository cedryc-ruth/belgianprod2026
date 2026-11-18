<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                "firstname" => "Harrison",
                "lastname" => "Ford",
                "birthday" => "13/07/1942",
                "gender" => "h",
            ],
            [
                "firstname" => "Robert",
                "lastname" => "Pattinson",
                "birthday" => "13/05/1986",
                "gender" => "h",
            ],
            [
                "firstname" => "Zendaya",
                "lastname" => "Coleman",
                "birthday" => "01/09/1996",
                "gender" => "f",
            ],
            [
                "firstname" => "Sean",
                "lastname" => "Young",
                "birthday" => "20/11/1959",
                "gender" => "f",
            ],
            [
                "firstname" => "Jung",
                "lastname" => "Ho-yeon",
                "birthday" => "23/06/1994",
                "gender" => "f",
            ],
            [
                "firstname" => "Jo",
                "lastname" => "In-sung",
                "birthday" => "28/07/1981",
                "gender" => "h",
            ],
        ];

        foreach($data as $row) {
            $actor = new Actor();
            
            $actor->setFirstname($row["firstname"]);
            $actor->setLastname($row["lastname"]);

            $birthday = DateTime::createFromFormat("d/m/Y", $row["birthday"]);
            $actor->setBirthday($birthday);

            $actor->setGender($row["gender"]);

            $manager->persist($actor);
        }

        $manager->flush();
    }
}
