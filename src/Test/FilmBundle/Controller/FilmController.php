<?php

namespace Test\FilmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\FilmBundle\Entity\Film;
use Test\FilmBundle\Form\FilmType;

/**
 * Film controller.
 *
 */
class FilmController extends Controller
{

    /**
     * Lists all Film entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestFilmBundle:Film')->findAll();

        return $this->render('TestFilmBundle:Film:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Film entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Film();
        $form = $this->createForm(new FilmType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('film_show', array('id' => $entity->getId())));
        }

        return $this->render('TestFilmBundle:Film:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Film entity.
     *
     */
    public function newAction()
    {
        $entity = new Film();
        $form   = $this->createForm(new FilmType(), $entity);

        return $this->render('TestFilmBundle:Film:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Film entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Film')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Film:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Film entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Film')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $editForm = $this->createForm(new FilmType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Film:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Film entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Film')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Film entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FilmType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('film_edit', array('id' => $id)));
        }

        return $this->render('TestFilmBundle:Film:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Film entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestFilmBundle:Film')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Film entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('film'));
    }

    /**
     * Creates a form to delete a Film entity by id.
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
