<?php

namespace Objects\KarasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{

    /**
     * Creates a new Contact entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->getUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objects_karas_employee_profile'));
        }
        
        return $this->render('ObjectsKarasBundle:Contact:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Contact entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(\Objects\UserBundle\Entity\User $entity)
    {
        $form = $this->createForm(new \Objects\KarasBundle\Form\ContactType(), $entity, array(
            'action' => $this->generateUrl('employee_contact_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Contact entity.
     *
     */
    public function newAction()
    {
        $entity = $this->getUser();
        $form   = $this->createCreateForm($entity);

        return $this->render('ObjectsKarasBundle:Contact:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contact entity.
     *
     */
    public function showAction()
    {
        $entity = $this->getUser();

        return $this->render('ObjectsKarasBundle:Contact:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Contact entity.
     *
     */
    public function editAction()
    {
        $entity = $this->getUser();

        $editForm = $this->createEditForm($entity);

        return $this->render('ObjectsKarasBundle:Contact:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Contact entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(\Objects\UserBundle\Entity\User $entity)
    {
        $form = $this->createForm(new \Objects\KarasBundle\Form\ContactType(), $entity, array(
            'action' => $this->generateUrl('employee_contact_update'),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Contact entity.
     *
     */
    public function updateAction(Request $request)
    {
        $entity = $this->getUser();

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('objects_karas_employee_profile'));
        }

        return $this->render('ObjectsKarasBundle:Contact:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
}