<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends  AbstractController
{

    private array $messages = [
        ['message' => 'Hello', 'created' => '2022/06/12'],
        ['message' => 'Hi', 'created' => '2022/04/12'],
        ['message' => 'Bye', 'created' => '2021/05/12']
    ];

    #[Route('/', name: 'app_index')]
    public function index(UserProfileRepository $profiles): Response
    {
        $user = new User;
        $user->setEmail('email3@email.com');
        $user->setPassword('12345678');
        $profile = new UserProfile();
        $profile->setUser($user);
        $profiles->save($profile, true);

        return $this->render(
            'hello/index.html.twig', 
            [
                'messages' => $this->messages,
            ]
        );

    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne($id):Response
    {
        return $this->render(
            'hello/show_one.html.twig', 
            [
                'message' => $this->messages[$id]
            ]
        );
        // return new Response($this->messages[$id]);
    }
}

?>