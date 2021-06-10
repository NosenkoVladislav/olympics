<?php

namespace App\Form;

use App\Entity\Admin\Country;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Назва країни'
            ])
            ->add('goldMedalAmount', NumberType::class, [
                'label' => 'Золоті медалі'
            ])
            ->add('silverMedalAmount', NumberType::class, [
                'label' => 'Срібні медалі'
            ])
            ->add('bronzeMedalAmount', NumberType::class, [
                'label' => 'Бронзові медалі'
            ])
            ->add('countryCode', TextType::class,[
                'label' => 'Код країни'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
        ]);
    }
}
