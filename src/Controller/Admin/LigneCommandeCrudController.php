<?php

namespace App\Controller\Admin;

use App\Entity\LigneCommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class LigneCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LigneCommande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('commande'),
            AssociationField::new('produit'),
            NumberField::new('qte','Quantité'),
            NumberField::new('pourcent_remise','Remise (%)')
        ];
    }

}
