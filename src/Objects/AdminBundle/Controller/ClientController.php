<?php

namespace Objects\AdminBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Client controller.
 */
class ClientController extends Controller {

    public function removeImageAction($id) {
        $em = $this->getDoctrine()->getManager();
        $object = $em->getRepository('ObjectsKarasBundle:Client')->find($id);
        if (!$object) {
            $this->createNotFoundException();
        }
        $object->removeImage();
        $em->flush();
        return new Response('Done.');
    }

}
