<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocialPostController extends AbstractController
{
    #[Route('/social/post', name: 'app_social_post')]
    public function index(): Response
    {
        return $this->render('social_post/index.html.twig', [
            'controller_name' => 'SocialPostController',
        ]);
    }
}
