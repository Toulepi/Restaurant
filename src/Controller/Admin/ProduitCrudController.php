<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $nomProduit = TextField::new('nom_produit','Nom Produit');
        $nomCatg = AssociationField::new('categorie','Catégorie');
        $prixProduit = TextField::new('prix_produit','Prix HT(€)');
        $descrip = TextEditorField::new('description','Description');
        $updateAt = DateTimeField::new('updatedAt','Date Mise à jour');


        $imageFile = ImageField::new("imageFile")->setFormType(VichImageType::class);
        $imageName =  ImageField::new('imgName_produit','Image')->setBasePath('img/produits');

        //$imageFile = ImageField::new("imageFile")->setFormType(VichImageType::class);
        //$fichier =  ImageField::new('imgName_produit','Image1')->setBasePath('img/produits');

        $champs = [
            $nomProduit, $nomCatg, $prixProduit,$descrip //,$updateAt
        ];

        if (Crud::PAGE_INDEX === $pageName || Crud::PAGE_DETAIL === $pageName) {
            $champs[] = $imageName;
        } else {
            $champs[] = $imageFile;
        }

        return $champs;
    }
}
