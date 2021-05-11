<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use AppBundle\form\usuarioType;
use AppBundle\Entity\usuario;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class DefaultController extends Controller
{


    /**
    * @Route("/login/", name="login")
    */
    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils)

    {
      /*AuthenticationUtils: libreria que nos permite capturar
      los errores que puedan suceder durante el logueo*/
      # no olvidar de agregar en el security.yml las configuraciones de login path y check path
            $error = $authenticationUtils->getLastAuthenticationError();
            $lastUsername = $authenticationUtils->getLastUsername();
            if($error){
                  $this->addFlash('warning',
                  'Usuario o Password incorrectos');          
            }
        return $this->render('acceso/login.html.twig', array(  
           'last_username' => $lastUsername,
           'error'         => $error,
         ));
      }

    /**
     * @Route("/", name="homePage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('homePage.html.twig');
    }

    /**
     * @Route("/principal/", name="principal")
     */
     public function principalAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('gestionUsuarios/principal.html.twig');
     }
    

}
