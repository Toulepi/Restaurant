<?php

namespace App\Security;

use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**C'est une classe gardienne, encore appelée classe Listener, par défaut elle s'exécute avant tout autre chose dans l'appli
 * Class LoginFormAuthenticator
 * @package App\Security
 */
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;
    public const LOGIN_ROUTE = 'app_login';

    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var CsrfTokenManagerInterface
     */
    private $csrfTokenManager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * LoginFormAuthenticator constructor.
     * @param ClientRepository $clientRepository
     * @param RouterInterface $router
     * @param CsrfTokenManagerInterface $csrfTokenManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(ClientRepository $clientRepository,RouterInterface $router, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->clientRepository = $clientRepository;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    // méthode appelée avant toutes les autres méthodes
    public function supports(Request $request)
    {
        //die("notre process de connexion démarre ici !!!");

        // dans les requètes de type "POST", on récupère les attributs qui ont la route 'app_login'
        return ($request->attributes->get('_route') === "app_login") && ($request->ismethod("POST"));
    }

    //  cette méthode est déclenchée si return ci-dessus vaut 'true'
    public function getCredentials(Request $request)
    {
        //dd($request->request->all());  //récupération de la requète avec tout ce qu'elle contient
        $credentials = [
            "email" => $request->request->get('email'),
            "password" => $request->request->get('password'),
            "_csrf_token" => $request->request->get('_csrf_token')
        ];

        // on met "LAST_USERNAME" en session
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['email']
        );
        return $credentials;
    }

    // getUser permet de récupérer le User qui correspond au "Credentials" passé par la méthode "getCredentials"
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        //dd($credentials);
        $token = new CsrfToken('authenticate', $credentials['_csrf_token']);  // instanciation du token qui a été soumis

        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        // retourne un User via le "UserRepository"
        $user = $this->clientRepository->findOneBy(['email' => $credentials['email']]); // recherche par 'email' et <lève une exception> (erreur) s'il n'y a rien
        if (!$user) {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('Email non reconnu.');

        }
        return $user;
    }

    // Vérification d'authentification
    public function checkCredentials($credentials, UserInterface $user)
    {
        dump($credentials);
        dd($user);
        return $this->passwordEncoder->isPasswordValid($user,$credentials['password']);  // permet de comparer le "mdp" encoder en BDD avec celui insérer par le User

            /*
             if (($credentials['password']) === ($user->getPassword())) {
               echo ("mot de passe correct");
                return true;
            } else {
                return false;
            }
            */
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
         //dd("Authentification réussie !!!");
        $cheminCible = $this->getTargetPath($request->getSession(), $providerKey);  // mémorisation de l'ancienne Route
        if ($cheminCible) {
            return new RedirectResponse($cheminCible);
        }

        // redirection vers la route 'app_login' grâce à la méthode 'generate' de la classe 'RouterInterface'
        return new RedirectResponse($this->router->generate('newstyl_accueil'));
    }

    /**Cette méthode est appelée à chaque fois qu'il y aura un problème dans l'exécution séquentielle des méthodes de la classe "LoginFormAuthenticator".
     * Elle doit être définie
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('app_login');
    }
}
