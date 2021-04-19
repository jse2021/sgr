<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\usuario;
use AppBundle\form\nuevoUsuarioType;
use AppBundle\form\consultarUsuarioType;



/**
*@Route("/gestionUsuarios")
**/

class gestionUsuariosController extends Controller
{
          //
          // /**
          //  * @Route("/nuevoUsuario", name="nuevoUsuario")
          //  */
          //  public function nuevoUsuarioAction(Request $request)
          // {
          //     $usuario = new usuario();
          //     $form = $this->createForm(nuevoUsuarioType::class, $usuario);
          //     $form ->handleRequest($request);
          //
          //     if ($form->isSubmitted() && $form->isValid()) {
          //           // rellenar el entity tapa
          //           $user = $form->getData();
          //          //almacenar nueva tapa
          //           $em = $this->getDoctrine()->getManager();
          //           // objeto a almacenar "tapa"
          //           $em ->persist($user);
          //           //finalizar comunicacion con bd
          //           $em->flush();
          //           // al crear, redirije a la ruta tapa con el id de la nueva tapa
          //           return $this->redirectToRoute('nuevoUsuario');
          //    }
          //     /*de esta forma habilito para usar las variables en index*/
          //     return $this->render('gestionUsuarios/nuevoUsuario.html.twig',array('form' => $form->createView()));
          // }
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
