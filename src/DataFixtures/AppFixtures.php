<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use DateInterval;
use Faker\Factory;
use App\Entity\Project;
use App\Entity\Education;
use App\Entity\ProfessionalExperience;
use App\Entity\Technology;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $existingProject = $manager->getRepository(Project::class)->findAll();
        $existingProfessionalExperience = $manager->getRepository(ProfessionalExperience::class)->findAll();
        $existingEducation = $manager->getRepository(Education::class)->findAll();
        $existingTechnology = $manager->getRepository(Technology::class)->findAll();
        $existingContact = $manager->getRepository(Contact::class)->findAll();


        $randNumber = rand(1, 3);

        // Load fixtures for Project
        if (empty($existingProject)) {
            for ($i = 0; $i < 8; $i++) {
                $word = $faker->word();
                $project = new Project();
                $project->setName($faker->sentence($randNumber))
                    ->setDescription(($faker->realTextBetween(120, 200)))
                    ->setRanking($i + 1)
                    ->setRepositoryLink("https://github.com/LuckyFail8/$word")
                    ->setWebsiteLink("https://$word.com");

                $manager->persist($project);
            }
        }

        // Load fixtures for Professional Experience
        if (empty($existingProfessionalExperience)) {
            for ($i = 0; $i < 3; $i++) {
                $dateTime = $faker->dateTime();
                $endDate = clone $dateTime;
                $endDate->add(new DateInterval("P{$randNumber}Y"));

                $professionalExp = new ProfessionalExperience();
                $professionalExp->setStartDate($dateTime)
                    ->setEndDate($endDate)
                    ->setPosition($faker->jobTitle())
                    ->setCompany($faker->company())
                    ->setDescription(($faker->realTextBetween(120, 200)));

                $manager->persist($professionalExp);
            }
        }

        // Load fixtures for Education
        if (empty($existingEducation)) {
            for ($i = 0; $i < 2; $i++) {
                $education = new Education();
                $education->setTitle($faker->jobTitle())
                    ->setYear($faker->date('Y'))
                    ->setDescription($faker->realTextBetween(80, 120));

                $manager->persist($education);
            }
        }

        // Load fixtures for Technology
        if (empty($existingTechnology)) {
            $technologies = ['PHP', 'Symfony', 'MySQL', 'HTML', 'CSS', 'JavaScript', 'Git'];
            foreach ($technologies as $key => $technologyData) {
                $technology = new Technology();
                $technology->setName($technologyData)
                    ->setRanking($key + 1);

                $manager->persist($technology);
            }
        }


        // Load fixtures for Contact
        if (empty($existingContact)) {
            for ($i = 0; $i < 5; $i++) {
                $contact = new Contact;
                $contact->setFullName($faker->name())
                    ->setCompanyName($faker->company())
                    ->setEmail($faker->email())
                    ->setSubject('Demande n°' . ($i + 1))
                    ->setMessage($faker->text());

                $manager->persist($contact);
            }
        }


        $manager->flush();
    }
}
