<?php

namespace App\Form;

use App\ClassSearch\CarSearch;
use App\Entity\BrandOfCar;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categories', EntityType::class, [
                'placeholder' => 'Choisir une ou plusieurs catégories',
                'label' => false,
                'required' => false,
                'class' => Category::class,
                'multiple' => true
            ])
            ->add('brand', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => BrandOfCar::class,
                'multiple' => true
            ])
            ->add('maxPrice', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Prix maximale']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
