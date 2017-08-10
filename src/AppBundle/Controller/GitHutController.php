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
     * @Route("/{username}", name="githut",defaults={"username"="codereviewvideos"})
     * @param Request $request
     */
    public function githutAction(Request $request,$username){

      

        $properties = [
          
            "repo_count"=>100,
            "most_stars"=>67,

            "repos" => [
                [
                    "name"=>"some repository",
                    "url" => "http://codereview.com",
                    "stargazers_count" => 46,
                    "description"=>"Learn symfony 3"
                ],
                [
                    "name"=>"another repository",
                    "url" => "http://bbc.com",
                    "stargazers_count" => 22,
                    "description"=>"The bbc"
                ],
                [
                    "name"=>"google repo",
                    "url" => "http://google.com",
                    "stargazers_count" => 15,
                    "description"=>"Google search engine"
                ]

            ]
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
}