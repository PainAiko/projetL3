<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,array('attr' =>array('class'=>'form-control')))
            ->add('qte',TextType::class,array('attr' =>array('class'=>'form-control')))
            ->add('pu',TextType::class,array('attr' =>array('class'=>'form-control')))
        ->add('idCategorie',EntityType::Class,array('label' => 'Categorie','class' =>Categorie::Class,'choice_label'=>'libelle'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
