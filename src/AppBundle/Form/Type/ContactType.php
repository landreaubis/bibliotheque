<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('name', Type\TextType::class, ['label' => 'name'])
            ->add('message', Type\TextareaType::class, ['label' => 'message'])
            ->add('email', Type\EmailType::class, ['label' => 'email'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'translation_domain' => 'contact'
        ));
    }

    public function getName()
    {
        return 'contact';
    }
}
