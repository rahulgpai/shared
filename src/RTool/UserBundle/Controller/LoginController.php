<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/29/2016
 * Time: 12:27 AM
 */

namespace RTool\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RTool\UserBundle\Entity\User;
use RTool\UserBundle\Form\UserType;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login_form")
     */
    public function loginAction()
    {
        $securityAuthUtils = $this->get('security.authentication_utils');

        $error = $securityAuthUtils->getLastAuthenticationError();
        $lastusername = $securityAuthUtils->getLastUsername();

        if($this->getUser())
        {
            return $this->redirectToRoute('homepage', [], 301);
        }

        $form = $this->createForm(UserType::class, new User())
            ->add('Login', 'Symfony\Component\Form\Extension\Core\Type\SubmitType');

        return $this->render('login/login.html.twig', ['error' => $error, 'lastusername' => $lastusername, 'form'=> $form->createView()]);
    }

    /**
     * @Route("/login_check", name="login_check")
     * @inheritdoc
     */
    public function loginCheckAction()
    {

    }

    /**
     * @Route("/logout", name="logout")
     * @inheritdoc
     */
    public function logoutAction()
    {

    }
}