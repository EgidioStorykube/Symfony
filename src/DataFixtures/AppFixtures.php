<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\SocialPost;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $socialPost1 = New SocialPost();
        $socialPost1 -> setTitle('Welcome!');
        $socialPost1 -> setText('Welcome!');
        $socialPost1 -> setCreated(new DateTime());

        $manager -> persist($socialPost1);

        $socialPost2 = New SocialPost();
        $socialPost2 -> setTitle('Welcome!');
        $socialPost2 -> setText('Welcome!');
        $socialPost2 -> setCreated(new DateTime());

        $manager -> persist($socialPost2);

        $socialPost3 = New SocialPost();
        $socialPost3 -> setTitle('Welcome!');
        $socialPost3 -> setText('Welcome!');
        $socialPost3 -> setCreated(new DateTime());

        $manager -> persist($socialPost3);


        $manager->flush();
    }
}
