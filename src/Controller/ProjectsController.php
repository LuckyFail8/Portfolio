<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projets', name: 'app_projects')]
    public function index(ProjectsRepository $repository): Response
    {
        $projects = $repository->findAll();
        return $this->render('pages/projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'projects' => $projects,
        ]);
    }
}
