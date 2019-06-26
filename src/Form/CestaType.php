<?php

namespace App\Form;

use App\Entity\Cesta;
use App\Entity\Familia;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CestaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('familia', EntityType::class, [
                'class' => Familia::class
            ])
            ->add('DescricaoCesta', null, array(
                'attr' =>
                    array(

                        'placeholder' => 'Descrição da Cesta',
                    )))
            ->add('DataCesta')
            ->add('attachment', FileType::class, [
                'mapped' => false
            ])
            ->add('salvar', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary float-right'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cesta::class,
        ]);
    }
}
