<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('streetName', null, [
                'label' => 'Ulica'
            ])
            ->add('streetNumber', null, [
                'label' => 'Numer budynku'
            ])
            ->add('apartmentNumber', null, [
                'label' => 'Numer mieszkania'
            ])
            ->add('postalCode', null, [
                'label' => 'Kod pocztowy'
            ])
            ->add('city', null, [
                'label' => 'Miasto'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
