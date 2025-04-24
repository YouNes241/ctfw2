<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Observation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
                $faker = Factory::create('fr_FR');
        
                $lion = new Animal();
                $lion->setNomCommun('Lion');
                $lion->setNomSavant('Panthera leo');
                $lion->setEmbranchement('Chordata');
                $lion->setClasse('Mammalia');
                $lion->setOrdre('Carnivora');
                $lion->setSousOrdre('Feliformia');
                $lion->setFamille('Felidae');
                $lion->setGenre('Panthera');
                $lion->setIucn('Vulnérable');
                $lion->setDescription($faker->paragraph);
                $manager->persist($lion);
        
                $elephant = new Animal();
                $elephant->setNomCommun('Éléphant');
                $elephant->setNomSavant('Loxodonta africana');
                $elephant->setEmbranchement('Chordata');
                $elephant->setClasse('Mammalia');
                $elephant->setOrdre('Proboscidea');
                $elephant->setSousOrdre('');
                $elephant->setFamille('Elephantidae');
                $elephant->setGenre('Loxodonta');
                $elephant->setIucn('Vulnérable');
                $elephant->setDescription($faker->paragraph);
                $manager->persist($elephant);
        
                $tiger = new Animal();
                $tiger->setNomCommun('Tigre');
                $tiger->setNomSavant('Panthera tigris');
                $tiger->setEmbranchement('Chordata');
                $tiger->setClasse('Mammalia');
                $tiger->setOrdre('Carnivora');
                $tiger->setSousOrdre('Feliformia');
                $tiger->setFamille('Felidae');
                $tiger->setGenre('Panthera');
                $tiger->setIucn('En danger');
                $tiger->setDescription($faker->paragraph);
                $manager->persist($tiger);
        
                $giraffe = new Animal();
                $giraffe->setNomCommun('Girafe');
                $giraffe->setNomSavant('Giraffa camelopardalis');
                $giraffe->setEmbranchement('Chordata');
                $giraffe->setClasse('Mammalia');
                $giraffe->setOrdre('Artiodactyla');
                $giraffe->setSousOrdre('Ruminantia');
                $giraffe->setFamille('Giraffidae');
                $giraffe->setGenre('Giraffa');
                $giraffe->setIucn('Vulnérable');
                $giraffe->setDescription($faker->paragraph);
                $manager->persist($giraffe);
        
                $rhinoceros = new Animal();
                $rhinoceros->setNomCommun('Rhinocéros');
                $rhinoceros->setNomSavant('Diceros bicornis');
                $rhinoceros->setEmbranchement('Chordata');
                $rhinoceros->setClasse('Mammalia');
                $rhinoceros->setOrdre('Perissodactyla');
                $rhinoceros->setSousOrdre('');
                $rhinoceros->setFamille('Rhinocerotidae');
                $rhinoceros->setGenre('Diceros');
                $rhinoceros->setIucn('En danger critique');
                $rhinoceros->setDescription($faker->paragraph);
                $manager->persist($rhinoceros);
        
                $polarBear = new Animal();
                $polarBear->setNomCommun('Ours polaire');
                $polarBear->setNomSavant('Ursus maritimus');
                $polarBear->setEmbranchement('Chordata');
                $polarBear->setClasse('Mammalia');
                $polarBear->setOrdre('Carnivora');
                $polarBear->setSousOrdre('Caniformia');
                $polarBear->setFamille('Ursidae');
                $polarBear->setGenre('Ursus');
                $polarBear->setIucn('Vulnérable');
                $polarBear->setDescription($faker->paragraph);
                $manager->persist($polarBear);
        
                $panda = new Animal();
                $panda->setNomCommun('Panda géant');
                $panda->setNomSavant('Ailuropoda melanoleuca');
                $panda->setEmbranchement('Chordata');
                $panda->setClasse('Mammalia');
                $panda->setOrdre('Carnivora');
                $panda->setSousOrdre('Caniformia');
                $panda->setFamille('Ursidae');
                $panda->setGenre('Ailuropoda');
                $panda->setIucn('Vulnérable');
                $panda->setDescription($faker->paragraph);
                $manager->persist($panda);
        
                $gorilla = new Animal();
                $gorilla->setNomCommun('Gorille');
                $gorilla->setNomSavant('Gorilla gorilla');
                $gorilla->setEmbranchement('Chordata');
                $gorilla->setClasse('Mammalia');
                $gorilla->setOrdre('Primates');
                $gorilla->setSousOrdre('Haplorhini');
                $gorilla->setFamille('Hominidae');
                $gorilla->setGenre('Gorilla');
                $gorilla->setIucn('En danger critique');
                $gorilla->setDescription($faker->paragraph);
                $manager->persist($gorilla);
        
                $koala = new Animal();
                $koala->setNomCommun('Koala');
                $koala->setNomSavant('Phascolarctos cinereus');
                $koala->setEmbranchement('Chordata');
                $koala->setClasse('Mammalia');
                $koala->setOrdre('Diprotodontia');
                $koala->setSousOrdre('Vombatiformes');
                $koala->setFamille('Phascolarctidae');
                $koala->setGenre('Phascolarctos');
                $koala->setIucn('Vulnérable');
                $koala->setDescription($faker->paragraph);
                $manager->persist($koala);
        
                $wolf = new Animal();
                $wolf->setNomCommun('Loup gris');
                $wolf->setNomSavant('Canis lupus');
                $wolf->setEmbranchement('Chordata');
                $wolf->setClasse('Mammalia');
                $wolf->setOrdre('Carnivora');
                $wolf->setSousOrdre('Caniformia');
                $wolf->setFamille('Canidae');
                $wolf->setGenre('Canis');
                $wolf->setIucn('Préoccupation mineure');
                $wolf->setDescription($faker->paragraph);
                $manager->persist($wolf);
        
                $animals = [$lion, $elephant, $tiger, $giraffe, $rhinoceros, $polarBear, $panda, $gorilla, $koala, $wolf];
        
                for ($i = 0; $i < 50; $i++) {
                    $observation = new Observation();
                    $observation->setDate($faker->dateTimeBetween('-1 year', 'now'));
                    $observation->setTime(\DateTime::createFromFormat('H:i', $faker->time('H:i')));
                    $observation->setLatitude($faker->latitude);
                    $observation->setLongitude($faker->longitude);
                    $observation->setDescription($faker->paragraph);
                    $observation->setAnimal($animals[$i % 10]);
                    $manager->persist($observation);
                }
        
                $manager->flush();
    }
}
