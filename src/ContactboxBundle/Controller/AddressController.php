<?php

namespace ContactboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ContactboxBundle\Entity\Address;

class AddressController extends Controller
{
    /**
     * @Route("/{id}/addAddress")
     * @Template()
     * @Method("GET")
     */
    public function addAddressAction($id)
    {
        $contact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        $newAddress = new Address();

        $form = $this->createFormBuilder($newAddress)
            ->setAction($this->generateUrl('contactbox_address_createaddress', ['id' => $id]))
            ->add('city')
            ->add('street')
            ->add('homeNumber')
            ->add('flatNumber')
            ->add('save', 'submit')
            ->getForm();

        //when @Template, return by array; else use return new Response();
        return ['form' => $form->createView(), 'contact' => $contact];
    }

    /**
     * @Route("/{id}/createAddress")
     * @Method("POST")
     */
    public function createAddressAction(Request $request, $id)
    {
        $contact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        $newAddress = new Address();

        $form = $this->createFormBuilder($newAddress)
            ->add('city')
            ->add('street')
            ->add('homeNumber')
            ->add('flatNumber')
            ->add('save', 'submit')
            ->getForm();

        $newAddress->setContact($contact);

        $contact->addAddress($newAddress);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($newAddress);

            $em->flush();

            $result = $this->redirectToRoute("contactbox_contact_showcontact", ['id' => $contact->getId()]);

            return $result;
        }

        return new Response();
    }

    /**
     * @Route("/{id}deleteAddress")
     * @Template()
     */
    public function deleteAddressAction()
    {

    }

}
