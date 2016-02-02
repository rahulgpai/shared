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
     * @Route("/user/add", name="add_user_form")
     */
    public function addUserAction(Request $request)
    {
        $user = new User();

        $rolesArr = $user->rolesArray;

        $form = $this->createForm(UserType::class, $user, ['action' => '../user/add', 'method' => 'POST'])
                     ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType', ['label' => 'User Email'])
                     ->add('roles', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',
                         ['label' => 'User Roles', 'choices' => $rolesArr, 'choices_as_values'=>true,
                             'choice_label' => function($rolesArr, $key, $index){
                                 return strtoupper($key);
                             }, 'multiple'=>true, 'expanded'=>true])
                     ->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', ['label' => 'Add User']);

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

            return $this->redirectToRoute("view_user_list", [], 301);
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