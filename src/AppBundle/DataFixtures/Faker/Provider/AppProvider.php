<?php
namespace AppBundle\DataFixtures\Faker\Provider;

class AppProvider
{
    public static function picture()
    {
        $pictures = array(
                'deadpool.jpg',
                'ironman2.jpg',
                'ironman3.jpg',
                'creed.jpg',
        );

        return $pictures[array_rand($pictures)];
    }
}