<?php

namespace App\Controller;

use App\Repository\ProfessionalExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionalExperienceController extends AbstractController
{
    #[Route('/experience', name: 'app_professional_experience')]
    public function index(ProfessionalExperienceRepository $repository): Response
    {
        $professionalExperiences = $repository->findAll();

        return $this->render('/pages/professional_experience/index.html.twig', [
            'controller_name' => 'ProfessionalExperienceController',
            'professionalExperiences' => $professionalExperiences,
        ]);
    }
}
