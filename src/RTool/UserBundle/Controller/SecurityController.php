<?php
/**
 * Created by PhpStorm.
 * User: RPai
 * Date: 1/29/2016
 * Time: 11:48 AM
 */

namespace RTool\UserBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class SecurityController extends Controller
{
    /*
     * @Route(path="/login", name="login_route")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('RToolUserBundle:Default:index.html.twig', array('lastusername' => $lastUsername, 'error' => $error));
    }

    /*
     * @Route(path="/login_check", name="login_check")
     */
    public function loginCheckAction()
    {

    }
}