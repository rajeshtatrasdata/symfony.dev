<?php
/**
 * Created by PhpStorm.
 * User: d-14
 * Date: 11/8/17
 * Time: 4:15 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusname}")
     */

    public function showAction($genusname){


        $notes = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs ... as they wrapped around me',
            'Inked!'
        ];
        return $this->render('genus/show.html.twig',[
            'name'=>$genusname,
            'notes'=>$notes
        ]);


    }

}