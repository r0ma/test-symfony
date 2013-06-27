<?php

namespace Test\FilmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\FilmBundle\Entity\Quality;
use Test\FilmBundle\Form\QualityType;

/**
 * Quality controller.
 *
 */
class QualityController extends Controller
{

    /**
     * Lists all Quality entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestFilmBundle:Quality')->findAll();

        return $this->render('TestFilmBundle:Quality:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Quality entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Quality();
        $form = $this->createForm(new QualityType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quality_show', array('id' => $entity->getId())));
        }

        return $this->render('TestFilmBundle:Quality:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Quality entity.
     *
     */
    public function newAction()
    {
        $entity = new Quality();
        $form   = $this->createForm(new QualityType(), $entity);

        return $this->render('TestFilmBundle:Quality:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Quality entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Quality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Quality:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Quality entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Quality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quality entity.');
        }

        $editForm = $this->createForm(new QualityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestFilmBundle:Quality:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Quality entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestFilmBundle:Quality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new QualityType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quality_edit', array('id' => $id)));
        }

        return $this->render('TestFilmBundle:Quality:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Quality entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestFilmBundle:Quality')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Quality entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quality'));
    }

    /**
     * Creates a form to delete a Quality entity by id.
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
