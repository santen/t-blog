<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/register")
     * @Template()
     */
    public function registerAction(){
        return $this->render('default/reg.html.twig');
    }

    /**
     * @Route("/adduser", name = "adduser")
     */
    public function addUserAction(Request $request){
        $user = array();
        array_push($user, $request->request->get("mail"));
        array_push($user, $request->request->get("passwd1"));
        array_push($user, $request->request->get("passwd2"));

        

        return $this->redirectToRoute('profile', array('id' => $user[0]));
    }

    /**
     * @Route("/profile/{id}", name = "profile")
     * @Template()
     */
    public function profileAction($id)
    {	
    	$user = "st3rax";
        return $this->render("default/profile.html.twig", array('user' => $id));
    }
}
