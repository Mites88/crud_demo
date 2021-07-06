<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;

class TagFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $tag = new Tag();
            $tag->setName(sprintf('Tag #%d', $i));
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
