<?php

namespace ContactboxBundle\Controller;

use ContactboxBundle\Entity\Phonenumber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PhoneNumberController extends Controller
{
    /**
     * @Route("/{id}/addPhonenumber")
     * @Template()
     * @Method("GET")
     */
    public function addPhonenumberAction($id)
    {
        $contact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        $newPhonenumber = new Phonenumber();

        $form = $this->createFormBuilder($newPhonenumber)
            ->setAction($this->generateUrl('contactbox_phonenumber_createphonenumber', ['id' => $id]))
            ->add('phoneNumber')
            ->add('phoneType')
            ->add('save', 'submit')
            ->getForm();

        return ['form' => $form->createView(), 'contact' => $contact];
    }

    /**
     * @Route("/{id}/createPhonenumber")
     * @Template()
     * @Method("POST")
     */
    public function createPhonenumberAction(Request $request, $id)
    {
        $contact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        $newPhonenumber = new Phonenumber();

        $form = $this->createFormBuilder($newPhonenumber)
            ->add('phoneNumber')
            ->add('phoneType')
            ->add('save', 'submit')
            ->getForm();

        $newPhonenumber->setContact($contact);

        $contact->addPhoneNumber($newPhonenumber);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newPhonenumber);
            $em->flush();

            $result = $this->redirectToRoute('contactbox_contact_showcontact', ['id' => $contact->getId()]);

            return $result;
        }
        $falseResult = $this->redirectToRoute('contactbox_phonenumber_addphonenumber', ['id' => $contact->getId()]);

        return $falseResult;
    }

    /**
     * @Route("/deletePhonenumber")
     * @Template()
     */
    public function deletePhonenumberAction()
    {
        return array(
                // ...
            );    }

}
