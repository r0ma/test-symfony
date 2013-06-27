<?php

namespace Test\BookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('translations', 'a2lix_translations_gedmo', array(
                'translatable_class' => "Test\BookBundle\Entity\Author"
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\BookBundle\Entity\Author'
        ));
    }

    public function getName()
    {
        return 'test_bookbundle_authortype';
    }
}
