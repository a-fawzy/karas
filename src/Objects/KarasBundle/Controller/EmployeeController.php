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
    
    public function viewAction($employeeId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ObjectsUserBundle:User')->find($employeeId);
        
        $experiences = $user->getExperiences();
        $projects    = $user->getProjects();
        $courses     = $user->getCourses();
        $skills      = $user->getSkills();
        $educations  = $user->getEducations();
        $languages   = $user->getLanguages();
        
        return $this->render('ObjectsKarasBundle:Employee:view.html.twig', array(
            'experiences' => $experiences,
            'projects' => $projects,
            'courses' => $courses,
            'skills' => $skills,
            'educations' => $educations,
            'languages' => $languages,
            'user' => $user
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
            $keywords    = ($request->request->get('keywords') == '' ? null : $request->request->get('keywords')) ;
            $title       = ($request->request->get('title') == '' ? null : $request->request->get('title')) ;
            $company     = ($request->request->get('company') == '' ? null : $request->request->get('company')) ;
            $experience1 = ($request->request->get('experience1') == '' ? null : $request->request->get('experience1')) ;
            $experience2 = ($request->request->get('experience2') == '' ? null : $request->request->get('experience2')) ;
            
            $session->set('industry', $industry);
            $session->set('profession', $profession);
            $session->set('location', $location);
            $session->set('nationality', $nationality);
            $session->set('languages', $languages);
            $session->set('dob', $dob);
            $session->set('keywords', $keywords);
            $session->set('title', $title);
            $session->set('company', $company);
            $session->set('experience1', $experience1);
            $session->set('experience2', $experience2);
        } else {
            $industry    = $session->get('industry');
            $profession  = $session->get('profession');
            $location    = $session->get('location');
            $nationality = $session->get('nationality');
            $languages   = $session->get('languages');
            $dob         = $session->get('dob');
            $keywords    = $session->get('keywords');
            $title       = $session->get('title');
            $company     = $session->get('company');
            $experience1 = $session->get('experience1');
            $experience2 = $session->get('experience2');
        }
        
        if(isset($keywords)){
            $keywords = explode(',', $keywords);
        }
        $maxResults = $this->container->getParameter('max_result');
        $experience1 = $experience1 * 365 ;
        $experience2 = $experience2 * 365 ;
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('ObjectsUserBundle:User')->getEmployees(
                $page, $maxResults, $industry,$profession,$location,
                $nationality,$languages,$dob,$keywords,$title,$company,
                $experience1, $experience2
        );
        
        $employees = $results['entities'];
        $count = $results['count'];
        
        $lastPageNumber = (int) ($count / $maxResults);
        
        if (($count % $maxResults) > 0) {
            $lastPageNumber++;
        }
        $countries = \Symfony\Component\Locale\Locale::getDisplayCountries('en');
        return $this->render('ObjectsKarasBundle:Employee:filter.html.twig', array(
            'employees' => $employees,
            'page' => $page,
            'lastPageNumber' => $lastPageNumber,
            'countries' => $countries
        ));
        
    }
    
}