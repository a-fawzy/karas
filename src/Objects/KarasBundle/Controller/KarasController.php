<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KarasController extends Controller
{
    public function indexAction()
    {
        return $this->render('ObjectsKarasBundle:Karas:index.html.twig', array(
            
        ));
    }
}
