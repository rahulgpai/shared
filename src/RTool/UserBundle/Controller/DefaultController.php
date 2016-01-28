<?php

namespace RTool\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {        
        return $this->render('RToolUserBundle:Default:index.html.twig');                
    }
    
    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
        return new Response('Hello world!');
    }
}
