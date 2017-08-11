<?php
/**
 * Created by PhpStorm.
 * User: d-14
 * Date: 10/8/17
 * Time: 10:44 AM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/githut/{username}", name="githut",defaults={"username"="codereviewvideos"})
     * @param Request $request
     */
    public function githutAction(Request $request,$username){

      $this->get('github_api')->getRepos($username);

        $properties = [
          "username"    => $username,

        ];

        return $this->render('githut/index.html.twig',$properties);
    }

    /**
     * @Route("/profile/{username}",name="profile")
     * @param Request $request
     */
    public function profileAction(Request $request,$username){
        $profileData = $this->get('github_api')->getProfile($username);



        return $this->render('githut/profile.html.twig',$profileData);
    }


    /**
     * @Route("/repos/{username}",name="repos")
     * @param Request $request
     */

    public function reposAction(Request $request,$username){
        $reposData = $this->get('github_api')->getRepos($username);



        return $this->render('githut/repos.html.twig',$reposData);
    }
}