<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KarasController extends Controller
{
    public function indexAction()
    {
        $em     = $this->getDoctrine()->getManager();
        $slides = $em->getRepository('ObjectsKarasBundle:Slide')->findBy(array(),array('power' => 'ASC'));
        
        return $this->render('ObjectsKarasBundle:Karas:index.html.twig', array(
            'slides' => $slides
        ));
    }
    
    public function servicesAction(){
        $em       = $this->getDoctrine()->getManager();
        $services = $em->getRepository('ObjectsKarasBundle:Service')->findBy(array(),array('power' => 'ASC'));
        $clients = $em->getRepository('ObjectsKarasBundle:Client')->findBy(array(),array('power' => 'ASC'));
        
        return $this->render('ObjectsKarasBundle:Karas:service.html.twig', array(
            'services' => $services,
            'clients' => $clients
        ));
    }
    
    public function contactAction(){
        $lan      = $this->container->getParameter('lan');
        $lat      = $this->container->getParameter('lat');
        $em       = $this->getDoctrine()->getManager();
        $branches = $em->getRepository('ObjectsKarasBundle:Branch')->findBy(array(),array('power' => 'ASC'));
        
        return $this->render('ObjectsKarasBundle:Karas:contact.html.twig', array(
            'lat' => $lat,
            'lan' => $lan,
            'branches' => $branches
        ));
    }
            
    public function emailAction(\Symfony\Component\HttpFoundation\Request $request){
        
        $contactEmail = $this->container->getParameter('contact_email');
        
        $body = $this->renderView('::Emails\contact_us.txt.twig', array(
            'name'  => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'message'  => $request->request->get('message'),
        ));
        
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact Form')
            ->setFrom($request->request->get('email'))
            ->setTo($contactEmail)
            ->setBody($body)
        ;
        
        $this->get('mailer')->send($message);
        return $this->redirect($this->generateUrl("objects_karas_homepage"));
    }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
}
