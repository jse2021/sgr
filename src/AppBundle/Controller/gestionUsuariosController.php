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
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
*@Route("/gestionUsuarios")
**/

class gestionUsuariosController extends Controller
{  
/**
 * @Route("/nuevoUsuario/{username}", name="nuevoUsuario")
 */
public function altaUsuarioAction(Request $request,UserPasswordEncoderInterface $passwordEncodert, $username = null) {      
// $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
$usuarioBd = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findOneBy(['username' => $username]);
  if($username) {
    $repository = $this->getDoctrine()->getRepository(Usuario::class);        
    $nUsuario = $repository->find($username);    
  } else { 
    $nUsuario = new usuario();
  }          
    /*CONSTRUYENDO FORMULARIO*/
    $form = $this->createForm(usuarioType::class, $nUsuario);
    /*Recoger la informacion del submit*/
    $form ->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $usuario = $form->getData();      
      $campoUsuario = $form->getData(['username']);
      $usuarioBd = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findOneBy(['username' => $campoUsuario]);
      $password = $passwordEncodert->encodePassword($nUsuario, $nUsuario->getPlainPassword());
      $nUsuario->setPassword($password);
      // Actualiza usuario
      if($usuarioBd == $campoUsuario){ 
        $usuario = $form->getData();      
        if ($form->get('roles')->getData() == ('ROLE_SUPER_ADMIN')) {
            $usuario->setRoles(array('ROLE_SUPER_ADMIN'));                          
        }
          if ($form->get('roles')->getData() == ('ROLE_USER')) {
            $usuario->setRoles(array('ROLE_USER'));
          }
        $em = $this->getDoctrine()->getManager();
        $em ->persist($usuario);
        $em->flush();
        $this->addFlash('success',
        'Cliente actualizado con éxito');          
        return $this->redirectToRoute('nuevoUsuario');
    }
        // Crea usuario
        if ($usuarioBd == null) {
          if ($form->get('roles')->getData() == ('ROLE_SUPER_ADMIN')) {
              $usuario->setRoles(array('ROLE_SUPER_ADMIN'));                          
          }
            if ($form->get('roles')->getData() == ('ROLE_USER')) {
                $usuario->setRoles(array('ROLE_USER'));
            }                      
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($usuario);
              $entityManager->flush();
              $this->addFlash('success',
              'Usuario guardado con éxito');
              return $this->redirectToRoute('nuevoUsuario');
          }
              if($usuarioBd){
                $this->addFlash('warning','Usuario existente');
                }


        } elseif ($form->isSubmitted() && (!$form->isValid())) { $this->addFlash('warning','Se han encontrado errores en el formulario');}
        return $this->render('gestionUsuarios/nuevoUsuario.html.twig',array('form' => $form->createView()));
 }


/**
* @Route("/consultarUsuario", name="consultarUsuario")
 */
public function consultarUsuarioAction(Request $request){

$repository = $this->getDoctrine()->getRepository(Usuario:: class);
$form = $this->createForm(consultarUsuarioType::class);
$form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) { 
    // obtengo el usuario del campo
    $campoUsuario = $form->getData(['username']);
    // Si usuario no trae nada, muestra nuevamente la pantalla consulta, sino muestra datos
    $usuario = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findOneBy(['username' => $campoUsuario]);

      if ($usuario === null) {
        $this->addFlash('warning','No existe el usuario');
      } else {
        return $this->render('gestionUsuarios/Usuario.html.twig',array("usuario" => $usuario));
      }
  }
return $this->render('gestionUsuarios/consultarUsuario.html.twig',array('form'=>$form->createView()));  
}

/**
 * @Route("/borrar/{username}", name="borrarUsuario")
 *
 */
public function borrarUsuarioAction(Request $request, $username = null){

  if($username) {
    // Busqueda del usuario
    $repository = $this->getDoctrine()->getRepository(Usuario::class);
    $usuario = $repository->find($username);
    // borrado
    $em = $this->getDoctrine()->getManager();
    $em ->remove($usuario);
    $em->flush();
  
  }
     return $this->redirectToRoute('consultarUsuario');
}

}
