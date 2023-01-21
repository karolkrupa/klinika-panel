<?php

namespace App\Admin\Field;

use App\Form\AddressType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

class AddressField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, $label = null)
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
//            ->setFieldFqcn(FormType::class)
            ->setFormType(AddressType::class)
//            ->setTemplatePath('admin/field/address.html.twig')
            ->addFormTheme('admin/field/theme.html.twig');
    }
}