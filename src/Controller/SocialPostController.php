<?php

namespace App\Controller;

use DateTime;
use App\Entity\SocialPost;
use App\Form\SocialPostType;
use App\Repository\SocialPostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

    #[Route('/social/post/add', name: 'app_social_post_add', priority: 2)]
    public function add(Request $request, SocialPostRepository $socialPosts):Response
    {
        $form = $this -> createForm(SocialPostType::class, new SocialPost());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $socialPost = $form->getData();
            $socialPost->setCreated(new DateTime());
            $socialPosts->save($socialPost, true);

            //add a flash
            $this->addFlash('success', 'Your post have been created');

            //redirect
            return $this->redirectToRoute('app_social_posts');
        }

        return $this->renderForm('social_post/add.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/social/post/{socialPost}/edit', name: 'app_social_post_edit')]
    public function edit(SocialPost $socialPost, Request $request, SocialPostRepository $socialPosts):Response
    {
        $form = $this -> createForm(SocialPostType::class, $socialPost);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $socialPost = $form->getData();
            $socialPosts->save($socialPost, true);

            //add a flash
            $this->addFlash('success', 'Your post have been Updated');

            //redirect
            return $this->redirectToRoute('app_social_posts');
        }

        return $this->renderForm('social_post/edit.html.twig', [
            'form' => $form,
        ]);

    }

}
