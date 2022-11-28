<?php

namespace App\Controller;

use App\Entity\SocialPost;
use App\Repository\SocialPostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocialPostController extends AbstractController
{
    #[Route('/social/posts', name: 'app_social_posts')]
    public function index(SocialPostRepository $socialPosts): Response
    {

        return $this->render('social_post/index.html.twig', [
            'socialPosts' => $socialPosts->findAll(),
        ]);
    }

    #[Route('/social/post/{socialPost}', name: 'app_social_post_show')]
    public function showOne(SocialPost $socialPost): Response
    {

        return $this->render('social_post/show.html.twig', [
            'socialPost' => $socialPost,
        ]);

    }

}
