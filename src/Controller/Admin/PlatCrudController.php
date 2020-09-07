<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PlatCrudController extends AbstractCrudController
{
    // the return must be a FQCN (fully-qualified class name) of a Doctrine ORM entity
    public static function getEntityFqcn(): string
    {
        return Plat::class;
    }


        public function configureFields(string $pageName): iterable
        {

            ImageField::new('img_plat')->setBasePath('img/plat');

            return [

               // IdField::new('id'),
                TextField::new('nom_plat','Nom Plat'),
                NumberField::new('prix_plat','Prix HT(€)'),
                TextEditorField::new('description','Résumé'),
                ImageField::new("imageFile",'Image')->setFormType(VichImageType::class),
                //TextField::new('img_plat','nom fichier')
            ];

    }


}
