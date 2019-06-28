<?php

namespace App\Form;

use App\Entity\Familia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamiliaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomeFamilia')
            ->add('Endereco')
            ->add('Bairro')
            ->add('DataCadastro')
            ->add('Biografia')
            ->add('Telefone')
            ->add('AssistenciaSocial')
            ->add('SituacaoEspecial')
            ->add('CadastroUnico')
            ->add('BeneficioGoverno')
            ->add('RendaFamiliar')
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
            'data_class' => Familia::class,
        ]);
    }
}
