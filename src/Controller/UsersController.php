<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager) {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_users')]
    public function index(): Response
    {
        $allUsers = $this->userRepository->findAll();

        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
            'allUsers' => $allUsers
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request): Response
    {
        $user = new User();
        $userForm = $this->createForm(UserFormType::class, $user);

        $userForm->handleRequest($request);
        if($userForm->isSubmitted() && $userForm->isValid()) {
            $newUser = $userForm->getData();
            $this->entityManager->persist($newUser);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_users');
        }

        return $this->render('users/add.html.twig', [
            'controller_name' => 'UsersController',
            'userForm' => $userForm->createView()
        ]);
    }

    #[Route('/import', name: 'import')]
    public function import(): Response
    {
        $content = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $usersArray = json_decode($content, true);

        foreach ($usersArray as $user) {

            $noSuchUser = !$this->userRepository->findBy(['username' => $user['username']]); // to avoid user duplication
            if ($noSuchUser) {
                $newUser = new User();
                $newUser->setName($user['name']);
                $newUser->setUsername($user['username']);
                $newUser->setStreet($user['address']['street']);
                $newUser->setSuite($user['address']['suite']);
                $newUser->setCity($user['address']['city']);
                $newUser->setZipcode(intval($user['address']['zipcode']));
                $newUser->setLat(floatval($user['address']['geo']['lat']));
                $newUser->setLng(floatval($user['address']['geo']['lng']));
                $newUser->setEmail($user['email']);
                $newUser->setPhone(($user['phone']));
                $newUser->setWebsite($user['website']);
                $newUser->setCompanyName($user['company']['name']);
                $newUser->setCompanyCatchPhrase($user['company']['catchPhrase']);
                $newUser->setCompanyBs($user['company']['bs']);

                $this->entityManager->persist($newUser);
            }
        }
        $this->entityManager->flush();

        return $this->redirectToRoute('app_users');
    }
}
