<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeeController extends Controller
{
    public function profileAction()
    {
        return $this->render('ObjectsKarasBundle:Karas:index.html.twig', array(
            
        ));
    }
    
    public function contactAction(){
        
    }
    
    
}
