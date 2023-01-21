<?php

namespace App\Controller\Admin;

use App\Entity\Visit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VisitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Visit::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Wizyta')
            ->setEntityLabelInPlural('Wizyty')
            ->setPageTitle(Crud::PAGE_NEW, 'Dodaj nową wizytę');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Dodaj wizytę');
            });
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('date', 'Data wizyty'),
            ChoiceField::new('status', 'Status')
                ->setChoices(array_flip(Visit::STATUS_CHOICES)),
            TextareaField::new('purposeDescription', 'Cel wizyty')
                ->hideOnIndex()
                ->setDisabled()
            ,
            TextareaField::new('description', 'Opis wizyty')
                ->hideWhenCreating()
                ->hideOnIndex()
            ,
            AssociationField::new('patient', 'Pacjent')
                ->hideWhenUpdating(),
            AssociationField::new('doctor', 'Lekarz')
                ->setRequired(false)
                ->hideWhenUpdating()
            ,
        ];
    }

}
