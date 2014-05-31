<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookmarkController extends Controller
{
    public function addAction(Request $request){
        $employeeId = $request->get('employeeId');
        $em = $this->getDoctrine()->getManager();
        $bookmark = $em->getRepository('ObjectsKarasBundle:Bookmark')->findOneBy(array(
            'employer' => $this->getUser()->getId(),
            'employee' => $employeeId
        ));
        if($bookmark){
            $em->remove($bookmark);
            $em->flush();
            echo "removed";
            exit;
        }
        $employee = $em->getRepository('ObjectsUserBundle:User')->find($employeeId);
        $bookmark = new \Objects\KarasBundle\Entity\Bookmark();
        $bookmark->setEmployer($this->getUser());
        $bookmark->setEmployee($employee);
        $em->persist($bookmark);
        $em->flush();
        
        echo "added";
        exit;
    }
    
    public function showAction(){
        $bookmarks = $this->getUser()->getBookmarks();
        $ids = array();
        foreach ($bookmarks as $bookmark) {
            $ids[$bookmark->getEmployee()->getId()] = $bookmark->getInquired();
        }
        
        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository('ObjectsUserBundle:User')->findBy(array(
            'id' => array_keys($ids)
        ));
        $countries = \Symfony\Component\Locale\Locale::getDisplayCountries('en');
        
        return $this->render('ObjectsKarasBundle:Bookmark:show.html.twig', array(
            'employees' => $employees,
            'ids' => $ids,
            'countries' => $countries
        ));
    }
    
    public function inquireAction(Request $request){
        $employeeId = $request->get('employeeId');
        $em = $this->getDoctrine()->getManager();
        $bookmark = $em->getRepository('ObjectsKarasBundle:Bookmark')->findOneBy(array(
            'employer' => $this->getUser()->getId(),
            'employee' => $employeeId
        ));
        if($bookmark){
            $bookmark->setInquired(true);
            $em->persist($bookmark);
            $em->flush();
        }
        //prepare the body of the email
        $body  = "Employer with Id: " . $this->getUser()->getId() . " sending inquiry about ";
        $body .= "Employee with Id: " . $employeeId ;
        //prepare the message object
        $message = \Swift_Message::newInstance()
                ->setSubject("New Employer Inquiry Received")
                ->setFrom($this->getUser()->getEmail())
                ->setTo($this->container->getParameter('contact_email'))
                ->setBody($body)
        ;
        //send the activation mail to the user
        $this->get('mailer')->send($message);
        
        echo "send";
        exit;
    }
}