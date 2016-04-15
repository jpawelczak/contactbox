<?php

namespace ContactboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ContactboxBundle\Entity\Contact;


class ContactController extends Controller
{
    /**
     * @Route("/new")
     * @Template()
     * @Method("GET")
     */
    public function newContactAction()
    {
        $newContact = new Contact();

        $form = $this->createFormBuilder($newContact)
            ->setAction($this->generateUrl('contactbox_contact_createcontact'))
            ->add('firstname')
            ->add('lastname')
            ->add('description')
            ->add('save', 'submit')
            ->getForm();

        //when @Template, return by array; else use return new Response();
        return ['form' => $form->createView()];

    }

    /**
     * @Route("/create")
     * @Template("ContactboxBundle:Contact:newContact.html.twig")
     * @Method("POST")
     */
    public function createContactAction(Request $request)
    {
        $newContact = new Contact();

        $form = $this->createFormBuilder($newContact)
            ->add('firstname')
            ->add('lastname')
            ->add('description')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($newContact);
            $em->flush();

            $result = $this->redirectToRoute("contactbox_contact_showcontact", ['id' => $newContact->getId()]);

            return $result;
        }

        //when using @Template, return by array; else return new Response();
        return ['form' => $form->createView()];

    }

    /**
     * @Route("/{id}")
     * @Template()
     * @Method("GET")
     */
    public function showContactAction(Request $request, $id)
    {
        $contact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        $addressFromContact = $contact->getAddress();

        $address = $this->getDoctrine()
            ->getRepository('ContactboxBundle:Address')
            ->findOneBy(array('contact' => $id));

        $phoneNumberFromContact = $contact->getPhoneNumber();

        $phoneNumber = $this->getDoctrine()
            ->getRepository('ContactboxBundle:Phonenumber')
            ->findOneBy(array('contact' => $id));


        var_dump($addressFromContact);

        //when template, return by array; else return new Response();
        return ['contact' => $contact, 'address' => $address, 'phoneNumber' => $phoneNumber];
    }

    /**
     * @Route("/{id}/modify")
     * @Template("ContactboxBundle:Contact:newContact.html.twig")
     *
     */
    public function modifyContactAction(Request $request, $id)
    {
        $modifyContact = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        if (!$modifyContact) {
            throw $this->createNotFoundException('Contact not found');
        }

        $form = $this->createFormBuilder($modifyContact)
            ->add('firstname')
            ->add('lastname')
            ->add('description')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('contactbox_contact_showcontact', ['id' => $modifyContact->getId()]);
        }

        //when using Template, return by array; else return new Response();
        return ['form' => $form->createView()];

    }

    /**
     * @Route("/{id}/delete")
     * @Method("GET")
     */
    public function deleteContactAction($id)
    {
        $deleteBook = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->find($id);

        if (!$deleteBook) {
            throw $this->createNotFoundException('Contact not found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($deleteBook);
        $em->flush();

        $this->redirectToRoute('contactbox_contact_showallcontacts');

        //when no @Template, always use return new Response(), even empty
        return new Response();
    }

    /**
     * @Route("/")
     * @Template()
     * @Method("GET")
     *
     */
    public function showAllContactsAction()
    {
        $allContacts = $this->getDoctrine()->getRepository('ContactboxBundle:Contact')->findAll();

        return ["allContacts" => $allContacts];
    }

    public function formContactAction()
    {

    }

}
