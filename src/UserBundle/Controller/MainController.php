<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/register")
     * @Template()
     */
    public function registerAction()
    {
        return $this->render('default/reg.html.twig');
    }

    /**
     * @Route("/profile/{id}")
     * @Template()
     */
    public function profileAction($id)
    {	
    	$user = "st3rax";
        return $this->render("default/profile.html.twig", array('user' => $user));
    }
}
