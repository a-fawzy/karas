<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Objects\KarasBundle\Entity\Job;

class JobController extends Controller
{
    public function newAction(Request $request)
    {
        $job = new Job();
        $form = $this->createJobForm($job);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $job = $form->getData();
                //user data are valid finish the signup process
                return $this->saveJob($job);
            }
        }
        
        return $this->render('ObjectsKarasBundle:Job:new.html.twig', array(
            'form' => $form->createView(),
            'path' => 'new'
        ));
    }
    
    public function createJobForm($job){
        
        $form = $this->createFormBuilder($job)
            ->add('title')
            ->add('experience')
            ->add('description')
            ->add('gender', 'choice', array(
                'choices'   => array('male' => 'Male', 'female' => 'Female', 'both' => 'Both'),
                'required'  => true,
                'multiple' => false,
                'expanded' => true
            ))
            ->add('skills')
            ->add('languages')
            ->add('countryCode', 'country')
            ->add('city')
            ->add('profession', 'entity', array(
                'class' => 'ObjectsKarasBundle:Profession',
                'property' => 'title',
            ))
            ->add('industry', 'entity', array(
                'class' => 'ObjectsKarasBundle:Industry',
                'property' => 'title',
            ))
            ->add('salary', 'text')
            ->add('allowances')
        ->getForm();
        return $form;

    }
    
    public function saveJob($job){
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('ObjectsKarasBundle:Company')->findOneBy(array('user' => $this->getUser()->getId()));
        $job->setOwner($this->getUser());
        $job->setSize($company->getType());
        $em->persist($job);
        $em->flush();
        return $this->redirect($this->generateUrl('objects_karas_homepage'));
    }
    
    public function editAction(Request $request, $id){

        $em  = $this->getDoctrine()->getManager();
        $job = $em->getRepository('ObjectsKarasBundle:Job')->findOneBy(
                array(
                    'owner' => $this->getUser()->getId(),
                    'id' => $id
                )
        );
        
        $form = $this->createJobForm($job);
        
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $job = $form->getData();
                $em->persist($job);
                $em->flush();
                return $this->redirect($this->generateUrl('objects_karas_homepage'));
            }
        }
        
        return $this->render('ObjectsKarasBundle:Job:new.html.twig', array(
            'form' => $form->createView(),
            'path' => 'edit',
            'id' => $id
        ));
    }
    
    private function fixValues($variable){
        if($variable == 'all'){
            return null;
        }
        return $variable;
    }

    public function listAction(Request $request,$type, $profession, $page) {
        
        $maxResult = $this->container->getParameter('max_result');
        $em   = $this->getDoctrine()->getManager();
        $ownerId = null;
        $company = $em->getRepository('ObjectsKarasBundle:Company')->findOneBy(array('user' => $this->getUser()->getId()));
        if($company){
            $ownerId = $this->getUser()->getId();
        }
        $jobs = $em->getRepository('ObjectsKarasBundle:Job')
                ->getJobs($page, $maxResult, $this->fixValues($profession), $this->fixValues($type), $ownerId);
                
        return $this->render('ObjectsKarasBundle:Job:list.html.twig', array(
            'jobs' => $jobs['entities'],
            'type' => $type,
            'owner' => $ownerId,
        ));
    }
    
    public function showAction($id){
        $em   = $this->getDoctrine()->getManager();
        $job = $em->getRepository('ObjectsKarasBundle:Job')->find($id);
                
        return $this->render('ObjectsKarasBundle:Job:show.html.twig', array(
            'job' => $job
        ));
    }
    
    public function applyAction($id){
        //prepare the body of the email
        $body  = "Employee with Id: " . $this->getUser()->getId() . " applies to ";
        $body .= "Job with Id: " . $id ;
        //prepare the message object
        $message = \Swift_Message::newInstance()
                ->setSubject("Employee Applied to Job")
                ->setFrom($this->getUser()->getEmail())
                ->setTo($this->container->getParameter('contact_email'))
                ->setBody($body)
        ;
        //send the activation mail to the user
        $this->get('mailer')->send($message);
        
        return $this->redirect($this->generateUrl('objects_karas_homepage'));
    }
    
    
    public function searchAction(Request $request) {
        $countries = \Symfony\Component\Locale\Locale::getDisplayCountries('en');
        $em = $this->getDoctrine()->getManager();
        $industries = $em->getRepository('ObjectsKarasBundle:Industry')->findBy(array(),array('title' => 'ASC'));
        $professions = $em->getRepository('ObjectsKarasBundle:Profession')->findBy(array(),array('title' => 'ASC'));

        return $this->render('ObjectsKarasBundle:Job:search.html.twig', array(
            'industries' => $industries,
            'professions' => $professions,
            'countries' => $countries    
        ));
        
    }
    public function filterAction(Request $request, $page){
        $em  = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        if($request->getMethod() == "POST"){
            $keywords    = ($request->request->get('keywords') == '' ? null : $request->request->get('keywords')) ;
            $gender      = $request->request->get('gender') ;
            $type        = $request->request->get('type') ;
            $locations   = $request->request->get('locations') ;
            $salary      = $request->request->get('salary') ;
            $industries  = $request->request->get('industries') ;
            $professions = $request->request->get('professions') ;
            $company     = $request->request->get('company') ;

            $session->set('keywords', $keywords);
            $session->set('gender', $gender);
            $session->set('type', $type);
            $session->set('locations', $locations);
            $session->set('salary', $salary);
            $session->set('industries', $industries);
            $session->set('professions', $professions);
            $session->set('company', $company);

        } else {
            $keywords    = $session->get('keywords');
            $gender      = $session->get('gender');
            $type        = $session->get('type');
            $locations   = $session->get('locations');
            $salary      = $session->get('salary');
            $industries  = $session->get('industries');
            $professions = $session->get('professions');
            $company     = $session->get('company');
        }
        
        if(isset($keywords)){
            $keywords = explode(',', $keywords);
        }
        $maxResults = $this->container->getParameter('max_result');
        
        $results = $em->getRepository('ObjectsKarasBundle:Job')->searchJobs(
                $page, $maxResults, $this->fixValues($type), $keywords,$gender,$locations,
                $salary, $industries, $professions, $company
        );
        $jobs = $results['entities'];
        $count = $results['count'];
        
        $lastPageNumber = (int) ($count / $maxResults);
        
        if (($count % $maxResults) > 0) {
            $lastPageNumber++;
        }
        
        return $this->render('ObjectsKarasBundle:Job:filter.html.twig', array(
            'jobs' => $jobs,
            'type' => $type,
            'owner' => null,
            'type' => $type,
            'lastPageNumber' => $lastPageNumber,
            'page' => $page
        ));
    }
}