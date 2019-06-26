<?php

namespace App\Form;

use App\Entity\Familia;
use App\Entity\Pessoa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PessoaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomePessoa')
            ->add('familia', EntityType::class, [
                'class' => Familia::class
            ])
            ->add('DataNascimento')
            ->add('DataCadastro')
            ->add('Telefone')
            ->add('Celular')
            ->add('Email')
            ->add('user')
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
            'data_class' => Pessoa::class,
        ]);
    }
}
