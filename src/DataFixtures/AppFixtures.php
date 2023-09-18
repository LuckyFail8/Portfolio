<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Project;
use App\Entity\ProfessionalExperience;
use DateInterval;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $existingProject = $manager->getRepository(Project::class)->findAll();

        $existingProfessionalExperience = $manager->getRepository(ProfessionalExperience::class)->findAll();

        $randNumber = rand(1, 3);

        // $product = new Product();
        // $manager->persist($product);

        if (empty($existingProject)) {
            for ($i = 0; $i < 8; $i++) {
                $word = $faker->word();
                $project = new Project();
                $project->setName($faker->sentence($randNumber))
                    ->setDescription(($faker->paragraph($randNumber)))
                    ->setRanking($i + 1)
                    ->setRepositoryLink("https://github.com/LuckyFail8/$word")
                    ->setWebsiteLink("https://$word.com");

                $manager->persist($project);
            }
        }

        if (empty($existingProfessionalExperience)) {
            for ($i = 0; $i < 3; $i++) {
                $dateTime = $faker->dateTime();
                $endDate = clone $dateTime;
                $endDate->add(new DateInterval("P{$randNumber}Y"));
                $professionalExp = new ProfessionalExperience();
                $professionalExp->setStartDate($dateTime)
                    ->setEndDate($endDate)
                    ->setPosition($faker->words(2, true))
                    ->setCompany(ucwords($faker->words(2, true)))
                    ->setDescription(($faker->paragraph($randNumber)));

                $manager->persist($professionalExp);
            }
        }

        $manager->flush();
    }
}
