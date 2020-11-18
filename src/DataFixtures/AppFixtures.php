<?php

namespace App\DataFixtures;


use App\Entity\Adresse;
use App\Entity\Client;
use App\Entity\Command;
use App\Entity\InfoBancaire;
use App\Entity\Livreur;
use App\Entity\Menu;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        $faker = Factory::create();

        for($i = 0; $i < 2; $i++) {
            $menu = (new Menu())
                ->setDateMenu(new \DateTime('now'));

            $plat = (new Plat())
                ->setPrice(12)
                ->setDescription($faker->text)
                ->setNom('Plat du chef ' . $faker->lastName)
                ->setImage('public/images/plat1.jpg')
                ->setMenu($menu);

            $dessert = (new Plat())
                    ->setPrice(6)
                    ->setDescription($faker->text)
                    ->setNom('Dessert du chef patissier ' . $faker->name)
                    ->setImage('public/images/dessert' . $faker->numberBetween(1, 10) . '.jpg')
                    ->setMenu($menu);

            $em->persist($menu);
            $em->persist($plat);
            $em->persist($dessert);

            for($u = 0; $u < 5; $u++) {
                $address = (new Adresse())
                    ->setCodePostal($faker->numberBetween(11111, 99999))
                    ->setNumero($faker->numberBetween(1, 300))
                    ->setRue($faker->streetAddress)
                    ->setVille($faker->city);

                $user = (new Client())
                    ->setNom($faker->lastName)
                    ->setPrenom($faker->firstName)
                    ->setPassword($faker->password)
                    ->setCourriel($faker->email)
                    ->setTelephone($faker->phoneNumber)
                    ->setAdresseFacturation($address);

                $card = (new InfoBancaire())
                    ->setClient($user)
                    ->setCvv($faker->numberBetween(100, 999))
                    ->setNomCarte($user->getNom() . ' ' . $user->getPrenom())
                    ->setDateValidite(new \DateTime('+ 1 years'))
                    ->setNumeroCarte($faker->creditCardNumber);

                $em->persist($user);
                $em->persist($card);
                $em->persist($address);

                $livreur = (new Livreur())
                    ->setStatus("En livraison")
                    ->setTelephone($faker->phoneNumber)
                    ->setNom($faker->lastName)
                    ->setPrenom($faker->firstName)
                    ->setPassword($faker->password)
                    ->setCourriel($faker->email)
                    ->setLatitude($faker->latitude)
                    ->setLongitude($faker->longitude);

                for($k = 0; $k < 10; $k++) {
                    $livreur->addSac($plat);
                    $livreur->addSac($dessert);
                }

                $livreur2 = (new Livreur())
                    ->setStatus("Deconnecté")
                    ->setTelephone($faker->phoneNumber)
                    ->setNom($faker->lastName)
                    ->setPrenom($faker->firstName)
                    ->setPassword($faker->password)
                    ->setCourriel($faker->email)
                    ->setLatitude($faker->latitude)
                    ->setLongitude($faker->longitude);

                for($k = 0; $k < 10; $k++) {
                    $livreur2->addSac($plat);
                    $livreur2->addSac($dessert);
                }

                for($i = 0; $i < 2; $i++) {
                    $commandDelivered = (new Command())
                        ->addMeal($plat)
                        ->addMeal($dessert)
                        ->setStatus("Livrée")
                        ->setCommandDate((new \DateTime('now'))->modify('-1 day'))
                        ->setTotalPrice($plat->getPrice() + $dessert->getPrice())
                        ->setAdresse($address)
                        ->setLivreur($livreur);

                    $em->persist($commandDelivered);
                }

                $command = (new Command())
                    ->addMeal($plat)
                    ->addMeal($dessert)
                    ->setStatus("Payée en cours")
                    ->setCommandDate(new \DateTime('now'))
                    ->setTotalPrice($plat->getPrice() + $dessert->getPrice())
                    ->setAdresse($address)
                    ->setLivreur($livreur);

                $em->persist($livreur);
                $em->persist($livreur2);
                $em->persist($command);
            }
        }

        $em->flush();
    }
}