<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Users;

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
        $mail = $request->request->get("mail");
        $nickname = explode('@', $mail)[0];

        $model = $this->getDoctrine()->getManager();

        $user = new Users();
        $user->setNickname($nickname);
        $user->setMail($mail);
        $user->setPasswd($request->request->get("passwd1"));
        $user->setPosts(0);

        $model->persist($user);
        $model->flush();

        return $this->redirectToRoute('profile', array('id' => $user->getId()));
    }

    /**
     * @Route("/profile/{id}", name = "profile")
     * @Template()
     */
    public function profileAction($id)
    {	
        $user = $this->getDoctrine()->getRepository("UserBundle:Users")->find($id);
    	
        return $this->render("default/profile.html.twig", array('user' => $user->getNickname()));
    }
}
