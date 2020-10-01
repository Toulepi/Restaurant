<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\RegisterType;
use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * Class RegisterController
 * @package App\Controller
 * @Route ("/register",name="app_")
 */
class RegisterController extends AbstractController
{
    /**
     * @Route("/", name="register")
     * @param Request $request
     * @param AppService $service
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function register(Request $request,AppService $service,UserPasswordEncoderInterface $passwordEncoder)
    {
        $client = new Client();
        $form = $this->createForm(RegisterType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nomClient = $form->get('nom_client')->getData();
            $client->setNomClient($service->capitalize($nomClient));

            $mdp = $form->get('mdp')->getData();
           // dump($mdp);
            $mdp = $passwordEncoder->encodePassword($client, $mdp);  // cryptage du "mdp" soumis
           // dd($mdp);
            $client->setMdp($mdp);   // reecriture du champ "mdp" par sa valeur cryptée

            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();  // persistance en BDD

            return $this->redirectToRoute('app_login');
        }

        return $this->render('register/register.html.twig', [
            'titre_page' => $service->getTitre("Ajout Client"),
            'client' => $client,
            'form' => $form->createView(),
            'lignesCmds' => $service->contenuDuPanier(),
            'total' => $service->getTotalPanier()
        ]);
    }
}
