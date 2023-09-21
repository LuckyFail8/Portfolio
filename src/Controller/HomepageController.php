<?php

namespace App\Controller;

use App\Repository\EducationRepository;
use App\Repository\ProfessionalExperienceRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomepageController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(
        TechnologyRepository $technologyRepository,
        ProjectRepository $projectRepository,
        ProfessionalExperienceRepository $professionalExperienceRepository,
        EducationRepository $educationRepository
    ): Response {
        $technologiesByRanking = $technologyRepository->findByRankingAsc();
        $firstThreeProjects = $projectRepository->findFirstThreeProjects();
        $professionalExperiences = $professionalExperienceRepository->findByEndDateDesc();
        $educations = $educationRepository->findByYearDesc();

        return $this->render('pages/home.html.twig', [
            'technologies' => $technologiesByRanking,
            'firstThreeProjects' => $firstThreeProjects,
            'professionalExperiences' => $professionalExperiences,
            'educations' => $educations,
        ]);
    }
}
