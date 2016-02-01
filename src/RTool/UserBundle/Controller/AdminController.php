<?php
/**
 * Created by PhpStorm.
 * User: RPai
 * Date: 1/29/2016
 * Time: 12:57 PM
 */

namespace RTool\UserBundle\Controller;


use RTool\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminController
 * @package RTool\UserBundle\Controller
 * @Route(path="/admin", name="admin_index")
 */
class AdminController extends Controller
{
    /*
     * @Route(path="", name="admin_index_page")
     * @Route(path="/", name="admin_index")
     */
    public function indexAction()
    {
        $users = new User();

        $em = $this->getDoctrine()->getEntityManager()->getRepository(User::class);

        $userlist = $em->findAll();

        print_r($userlist); exit;

        return $this->render('RToolUserBundle:admin:index.html.twig', ['data' => 'Admin Index Page', 'userlist' => $userlist]);
    }


    /*
     * @Route(path="/user/add", name="admin_add_user")
     */
    public function addUserAction(Request $request)
    {

    }
}