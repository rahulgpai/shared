<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/29/2016
 * Time: 2:21 AM
 */

namespace RTool\UserBundle\Controller;


use RTool\UserBundle\Entity\User;
use RTool\UserBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route(path="/user/show", name="user_show")
     *
     *
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getEntityManager()->getRepository(User::class);

        $userList = $em->findAll();

        return $this->render('users/show.html.twig', ['userlist' => $userList]);
    }

    /**
     * @Route("/user/add", name="add_user_form")
     */
    public function addUserAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user)
                     ->add('email', 'Symfony\Component\Form\Extension\Core\Type\TextType')
                     ->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', ['label', 'Add User']);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            /**
             * code to add user to the DB
             *
             */
            //return new Response("Inside Form Submitted");

            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($user);

            $em->flush();

            return $this->redirectToRoute("view_user_list", []);
        }

        return $this->render('users/adduser.html.twig', ['form' => $form->createView()]);

    }

    /**
     * @Route("/user/view", name="view_user_list")
     * @Route("/user/view", name="homepage")
     */
    public function viewUserAction()
    {
        $user = new User();

        $em = $this->getDoctrine()->getManager();

        $userList = $em->getRepository(User::class)->findAll();

        return $this->render('users/show.html.twig', ['users' => $userList]);
    }

    /**
     * @Route("/user/{userid}/view", name="user_view")
     */
    public function userViewAction($userid)
    {

    }
}