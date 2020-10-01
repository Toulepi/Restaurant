<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nom_client',
                null,           // par défaut on aura le type texte
                [
                    'label' => "Nom Client",
                    'attr' => [
                        'placeholder' => "Saisie Nom",
                        //'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'prenom_client',
                null,
                [
                    'label' => "Prenom Client",
                    'required' => true,
                    'attr' => [
                        'placeholder' => "Votre Prénom",
                        //'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'email',
                null,
                [
                    'label' => "Email",
                    'required' => true,
                    'attr' => [
                        'placeholder' => "Votre adresse mail",
                        //'class'=>'form-control',
                    ],
                ]
            )
        /*    ->add(
                'mdp',
                null,
                [
                    'label' => "Mot de Passe",
                    'required' => true,
                    'attr' => [
                        'placeholder' => "Votre code secret",
                        //'class'=>'form-control',
                    ],
                ]
            )*/
            ->add(
                'numTel',
                null,
                [
                    'label' => "Numéro Tél",
                    'attr' => [
                        'placeholder' => "Votre téléphone",
                        //'class'=>'form-control',
                    ],
                ]
            );
        # ->add('table_client')
        #->add('role')
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
