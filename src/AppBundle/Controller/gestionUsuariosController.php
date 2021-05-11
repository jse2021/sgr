<?php
namespace AppBundle\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\usuario;
use AppBundle\form\nuevoUsuarioType;
use AppBundle\form\usuarioType;
use AppBundle\form\consultarUsuarioType;



/**
*@Route("/gestionUsuarios")
**/

class gestionUsuariosController extends Controller
{

  
    /**
     * @Route("/nuevoUsuario/", name="nuevoUsuario")
     */
    public function altaUsuarioAction(Request $request,UserPasswordEncoderInterface $passwordEncodert)
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


/**
* @Route("/consultarUsuario", name="consultarUsuario")
 */
public function consultarUsuarioAction(Request $request)
{
  $usuario = new usuario();
  $form = $this->createForm(consultarUsuarioType::class, $usuario);
  return $this->render('gestionUsuarios/consultarUsuario.html.twig',array('form' => $form->createView()));
}
}



 ?>
