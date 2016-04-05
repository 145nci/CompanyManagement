<?php

namespace CompanyManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CompanyManagementBundle\Entity\Acl;
use CompanyManagementBundle\Form\AclType;

/**
 * Acl controller.
 *
 */
class AclController extends Controller
{
    /**
     * Lists all Acl entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $acls = $em->getRepository('CompanyManagementBundle:Acl')->findAll();

        return $this->render('acl/index.html.twig', array(
            'acls' => $acls,
        ));
    }

    /**
     * Creates a new Acl entity.
     *
     */
    public function newAction(Request $request)
    {
        $acl = new Acl();
        $form = $this->createForm('CompanyManagementBundle\Form\AclType', $acl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($acl);
            $em->flush();

            return $this->redirectToRoute('acl_show', array('id' => $acl->getId()));
        }

        return $this->render('acl/new.html.twig', array(
            'acl' => $acl,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Acl entity.
     *
     */
    public function showAction(Acl $acl)
    {
        $deleteForm = $this->createDeleteForm($acl);

        return $this->render('acl/show.html.twig', array(
            'acl' => $acl,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Acl entity.
     *
     */
    public function editAction(Request $request, Acl $acl)
    {
        $deleteForm = $this->createDeleteForm($acl);
        $editForm = $this->createForm('CompanyManagementBundle\Form\AclType', $acl);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($acl);
            $em->flush();

            return $this->redirectToRoute('acl_edit', array('id' => $acl->getId()));
        }

        return $this->render('acl/edit.html.twig', array(
            'acl' => $acl,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Acl entity.
     *
     */
    public function deleteAction(Request $request, Acl $acl)
    {
        $form = $this->createDeleteForm($acl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($acl);
            $em->flush();
        }

        return $this->redirectToRoute('acl_index');
    }

    /**
     * Creates a form to delete a Acl entity.
     *
     * @param Acl $acl The Acl entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Acl $acl)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acl_delete', array('id' => $acl->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
