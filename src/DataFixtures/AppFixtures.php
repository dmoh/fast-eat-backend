<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $customer = new User();
            $customer->setFirstname($faker->firstname);
            $customer->setLastname($faker->lastname);
            $customer->setEmail($faker->email);
            $customer->setPassword(password_hash('testtest', PASSWORD_BCRYPT));
            $customer->setPhoneNumber($faker->phoneNumber);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
