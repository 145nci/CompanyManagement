<?php

namespace CompanyManagementBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CompanyManagementBundle\Entity\User;
use CompanyManagementBundle\Form\UserType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('CompanyManagementBundle:User')->findAll();

        return $this->render('CompanyManagementBundle:User:index.html.twig', array(
            'users' => $users,
        ));
    }

    public function listAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $paginator  = $this->get('knp_paginator');

        $query = $em->getRepository('CompanyManagementBundle:User')->createQueryBuilder('u')
            ->where('1 = 1')->getQuery();

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        //TODO - role pracownik.
        return $this->render('CompanyManagementBundle:User:list.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('CompanyManagementBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->container->get('fos_user.user_manager');

            //hash password
            $data = $form->getData();
            $user->setUsername(md5($user->getFirstName(). $user->getLastName() . $user->getId()));
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $data->getPassword());
            $user->setPassword($encoded);

            $user->setDateAdded(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('CompanyManagementBundle:User:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('CompanyManagementBundle:User:show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('CompanyManagementBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_list', array('id' => $user->getId()));
        }

        return $this->render('CompanyManagementBundle:User:edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_list');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function expandAction(Request $request)
    {
        $user_id = trim($request->request->get('user_id'));
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CompanyManagementBundle:User')->findOneBy(array('id' => $user_id));
        $view = $this->render('CompanyManagementBundle:User:expand.html.twig', array('user' => $user))->getContent();

        return new JsonResponse(array('view' => $view));

    }
}
