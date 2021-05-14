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
            $password = $passwordEncodert->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);
            $rol = array();
            if ($rol == $form->getData(['Estandar']))
            {
                $usuario->setRoles(array('ROLE_USER'));
            } 
              if($rol == $form->getData(['Administrador'])) 
              {
                $usuario->setRoles(array('ROLE_ADMIN'));
              }
              if ($rol == $form->getData(['Administrador']) && $form->getData(['Estandar']))
              {
                $usuario->setRoles(array('ROLE_ADMIN','ROLE_USER'));
              }
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($usuario);
              $entityManager->flush();
              return $this->redirectToRoute('login');
     }
    //  $bool = StringUtils::equals($password1, $password2);
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
