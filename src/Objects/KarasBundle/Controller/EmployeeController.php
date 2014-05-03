<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class EmployeeController extends Controller
{
    public function profileAction()
    {
        $user = $this->getUser();
        $experiences = $user->getExperiences();
        
        return $this->render('ObjectsKarasBundle:Employee:profile.html.twig', array(
            'experiences' => $experiences
        ));
    }
}