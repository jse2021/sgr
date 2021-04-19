<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\form\usuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
    
    /**
     * @Route("/nuevoUsuario/", name="nuevoUsuario")
     */
     public function registroAction(Request $request,UserPasswordEncoderInterface $passwordEncodert)
    {
      $usuario= new usuario();
      /*CONSTRUYENDO FORMULARIO*/
      $form = $this->createForm(usuarioType::class, $usuario);
      /*Recoger la informacion del submit*/
      $form ->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // 2) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncodert->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);


            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();
            // al crear, redirije a la ruta tapa con el id de la nueva tapa
            return $this->redirectToRoute('login');
     }


      /*de esta forma habilito para usar las variables en index*/
        return $this->render('gestionUsuarios/nuevoUsuario.html.twig',array('form' => $form->createView()));
    }



}
