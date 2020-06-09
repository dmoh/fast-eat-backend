<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="get-user", methods={"GET"})
     */
    public function getUserById($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $data = [
            'id' => $user->getId(),
            'firstName' => $user->getFirstname(),
            'lastName' => $user->getLastname(),
            'email' => $user->getEmail(),
            'phoneNumber' => $user->getPhoneNumber(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }



    /**
     * @Route("/users/", name="getUsers", methods={"GET"})
     */
    public function getUsers()
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        dd($user);

        return new JsonResponse($user, Response::HTTP_OK);
    }


    /**
     * @Route("/add/user/", name="add_user", methods={"POST"})
     */
    public function addUser(Request $request)
    {

        // $data = json_decode($request->getContent(), true);
        $data = $request->request->all();

        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $phoneNumber = $data['phoneNumber'];/**/

        return new JsonResponse(['status' => 200, 'data' => $data], Response::HTTP_CREATED);
    }
}
