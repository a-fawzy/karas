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
            'languages' => $languages
        ));
    }
}