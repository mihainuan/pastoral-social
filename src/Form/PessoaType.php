<?php

namespace App\Form;

use App\Entity\Pessoa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PessoaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomePessoa')
            ->add('DataNascimento')
            ->add('DataCadastro')
            ->add('Telefone')
            ->add('Celular')
            ->add('Email')
            ->add('familia')
            ->add('user');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pessoa::class,
        ]);
    }
}
