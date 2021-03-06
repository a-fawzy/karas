<?php

namespace Objects\AdminBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Slide controller.
 */
class SlideController extends Controller {

    public function removeImageAction($id) {
        $em = $this->getDoctrine()->getManager();
        $object = $em->getRepository('ObjectsKarasBundle:Slide')->find($id);
        if (!$object) {
            $this->createNotFoundException();
        }
        $object->removeImage();
        $em->flush();
        return new Response('Done.');
    }

}
