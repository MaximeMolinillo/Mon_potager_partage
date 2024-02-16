<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UtilisateurFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($usr = 1; $usr <= 10; $usr++) {
            $user = new Utilisateur();
            $user->setNom($faker->lastname);
            $user->setPrenom($faker->firstname);
            $user->setEmail($faker->email);
            $user->setIdUtilisateur($faker->randomDigit);
            $user->setAnneeExperience($faker->randomDigit);
            $user->setNomUtilisateur($faker->word);
            $user->setLocalisationPotager($faker->city);
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'secret'));
            $user->setStatut('');

            $manager->persist($user);
        }
        $manager->flush();
    }
}
