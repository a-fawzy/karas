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
        $projects    = $user->getProjects();
        $courses     = $user->getCourses();
        $skills      = $user->getSkills();
        $educations  = $user->getEducations();
        $languages   = $user->getLanguages();
        
        return $this->render('ObjectsKarasBundle:Employee:profile.html.twig', array(
            'experiences' => $experiences,
            'projects' => $projects,
            'courses' => $courses,
            'skills' => $skills,
            'educations' => $educations,
            'languages' => $languages,
            'user' => $this->getUser()
        ));
    }
    
    public function searchAction(){

        $em = $this->getDoctrine()->getManager();
        $industries = $em->getRepository('ObjectsKarasBundle:Industry')->findBy(array(),array('title' => 'ASC'));
        $professions = $em->getRepository('ObjectsKarasBundle:Profession')->findBy(array(),array('title' => 'ASC'));
        $skills = $em->getRepository('ObjectsKarasBundle:Skill')->findBy(array(),array('name' => 'ASC'));
        $countries = \Symfony\Component\Locale\Locale::getDisplayCountries('en');
        return $this->render('ObjectsKarasBundle:Employee:search.html.twig', array(
            'industries' => $industries,
            'professions' => $professions,
            'skills' => $skills,
            'countries' => $countries 
        ));
    }
    
    public function filterAction(Request $request, $page){

        $session = $request->getSession();
        if($request->getMethod() == "POST"){
            $industry    = ($request->request->get('industry') == 'any' ? null : $request->request->get('industry')) ;
            $profession  = ($request->request->get('profession') == 'any' ? null : $request->request->get('profession')) ;
            $location    = ($request->request->get('location') == 'any' ? null : $request->request->get('location')) ;
            $nationality = ($request->request->get('nationality') == 'any' ? null : $request->request->get('nationality')) ;
            $languages   = $request->request->get('languages') ;
            $dob         = ($request->request->get('dob') == '' ? null : $request->request->get('dob')) ;
            
            $session->set('industry', $industry);
            $session->set('profession', $profession);
            $session->set('location', $location);
            $session->set('nationality', $nationality);
            $session->set('languages', $languages);
            $session->set('dob', $dob);
        } else {
            $industry = $session->get('industry');
            $profession = $session->get('profession');
            $location = $session->get('location');
            $nationality = $session->get('nationality');
            $languages = $session->get('languages');
            $dob = $session->get('dob');
        }
        
        
        $maxResults = $this->container->getParameter('max_result');
        
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('ObjectsUserBundle:User')->getEmployees(
                $page, $maxResults, $industry,$profession,$location,$nationality,$languages,$dob
        );
        
        $employees = $results['entities'];
        $count = $results['count'];
        
        $lastPageNumber = (int) ($count / $maxResults);
        
        if (($count % $maxResults) > 0) {
            $lastPageNumber++;
        }
        
        return $this->render('ObjectsKarasBundle:Employee:filter.html.twig', array(
            'employees' => $employees,
            'page' => $page,
            'lastPageNumber' => $lastPageNumber
        ));
        
    }
    
}