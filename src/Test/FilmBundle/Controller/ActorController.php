<?php

namespace Test\FilmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\FilmBundle\Entity\Actor;
use Test\FilmBundle\Form\ActorType;

/**
 * Actor controller.
 *
 */
class ActorController extends Controller
{

    /**
     * Lists all Actor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestFilmBundle:Actor')->findAll();

        return $this->render('TestFilmBundle:Actor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Actor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Actor();
        $form = $this->createForm(new ActorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actor_show', array('id' => $entity->getId())));
        }

        return $this->render('TestFilmBundle:Actor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Actor entity.
     *
     */
    public function newAction()
    {
        $entity = new Actor();
        $form   = $this->createForm(new ActorType(), $entity);

        return $this->render('TestFilmBundle:Actor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Actor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Actor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Actor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Actor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Actor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actor entity.');
        }

        $editForm = $this->createForm(new ActorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Actor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Actor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Actor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ActorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actor_edit', array('id' => $id)));
        }

        return $this->render('TestFilmBundle:Actor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Actor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestFilmBundle:Actor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actor'));
    }

    /**
     * Creates a form to delete a Actor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
