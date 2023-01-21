<?php

namespace App\Controller\Admin;

use App\Entity\Doctor;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DoctorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Doctor::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Lekarz')
            ->setEntityLabelInPlural('Lekarze')
            ->setPageTitle(Crud::PAGE_NEW, 'Dodaj nowego lekarza');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Dodaj lekarza');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstName', 'Imię'),
            TextField::new('lastName', 'Nazwisko'),
            TextField::new('pwz', 'PWZ'),
            TextField::new('title', 'Tytuł'),
        ];
    }

}
