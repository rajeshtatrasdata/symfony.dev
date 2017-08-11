<?php
/**
 * Created by PhpStorm.
 * User: d-14
 * Date: 11/8/17
 * Time: 12:48 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\RedditPost;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedditController extends Controller
{

    /**
     * @Route("/",name="list")
     */
    public function listAction(){

        $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();


        return $this->render(':reddit:index.html.twig',[
            'posts' => $posts
        ]);
    }

    /**
     * @param $text
     * @Route("/create/{text}",name="create")
     */

    public function createAction($text){

        $em = $this->getDoctrine()->getManager();
        $post = new RedditPost();
        $post->setTitle("Hello ".$text);
        $em->persist($post);
        $em->flush();
        return $this->redirectToRoute('list');

    }

    /**
     * @Route("/update/{id}/{text}",name="update")
     */

    public function updateAction($id,$text){
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:RedditPost')->find($id);

        if(!$post){
            throw $this->createNotFoundException('Thats not a record');

        }
        $post->setTitle('updated title '.$text);
        $em->flush();

        return $this->redirectToRoute('list');

    }

    /**
     * @param $id
     * @Route("/delete/{id}",name="delete")
     */

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:RedditPost')->find($id);

        if(!$post){
            throw $this->createNotFoundException('Thats not a record');

        }

        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('list');

    }
}