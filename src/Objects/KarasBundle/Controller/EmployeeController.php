<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class EmployeeController extends Controller
{
    public function profileAction()
    {
        if($this->getUser()->getPhone()){
            $contact = true;
        }
        if($this->getUser()->getSummary())
        {
            $summary = true;
        }
        
        return $this->render('ObjectsKarasBundle:Employee:profile.html.twig', array(
            
        ));
    }
    
    
}
