<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/31/2016
 * Time: 12:57 AM
 */

namespace RTool\UserBundle\Controller;


use RTool\UserBundle\Entity\Blog;
use RTool\UserBundle\Form\BlogType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class BlogController extends Controller
{
    /**
     * @Route("/blog/add", name="blog_posts_add")
     *
     */
    public function addAction(Request $request)
    {
        $blog = new Blog();

        $form = $this->createForm(BlogType::class, $blog)->add('submit', 'submit', ['label', 'Save Blog']);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($blog);

            $em->flush();

            return $this->render('blog/index.html.twig',[]);
        }

        //$formView = $form->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType')->createView();

        return $this->render('blog/add.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/blog", name="blog_index_list")
     * @Route("/blog/list", name="blog_lists")
     *
     */
    public function listAction()
    {
        $blog = new Blog();

        $em = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Blog');

        $blogs = $em->findAll();

        return $this->render('blog/list.html.twig', ['blogs' => $blogs, 'form' => $this->createForm(BlogType::class, $blog)->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', ['label' => 'Save Blog'])->createView()]);
    }
}