<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\cliente;
use AppBundle\form\nuevoClienteType;
use AppBundle\form\consultarClienteType;
use Doctrine\ORM\ORMException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 *paco.gomez.arnal@gmail.com correo de paco
 *se crea esta clase para tener un control de quien puede hacer una accion especifica y quien NO.
*/
/**
 * @Route("/gestionClientes")
 */
class gestionClientesController extends Controller
{
  /**
   * @Route("/nuevoCliente", name="nuevoCliente")
   *
   */

  public function nuevoClienteAction(Request $request)
  {
    $tapa= new cliente();
    /*CONSTRUYENDO FORMULARIO*/
    $form = $this->createForm(nuevoClienteType::class, $tapa);
    /*Recoger la informacion del submit*/
    $form ->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
          // rellenar el entity tapa
          $cliente = $form->getData();
         //almacenar nueva tapa
          $em = $this->getDoctrine()->getManager();
          // objeto a almacenar "tapa"
          $em ->persist($cliente);
          //finalizar comunicacion con bd
          $em->flush();
          // al crear, redirije a la ruta tapa con el id de la nueva tapa
          return $this->redirectToRoute('nuevoCliente');
   }

    /*de esta forma habilito para usar las variables en index*/
      return $this->render('gestionClientes/nuevoCliente.html.twig',array('form' => $form->createView()));
  }

  /**
   * @Route("/consultarCliente", name="consultarCliente" )
   */
   public function consultarClienteAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository(Cliente::class);
    $form = $this->createForm(consultarClienteType::class);
    
    $form ->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) { 
      
      // obtengo el dni
        $campoDni = $form->getData([0]);            
        // ya obtuve los datos del campo, faltaria comparar si existe en la base de datos, si es asi, traer todos los datos del cliente.
         $cliente = $this->getDoctrine()->getRepository('AppBundle:Cliente')
                ->findOneBy(['dni' => $campoDni]);

        $dniBaseDatos= $cliente->getDni();
        return $this->render('gestionclientes/Cliente.html.twig',array("cliente" => $cliente));
        
        }
         
        return $this->render('gestionclientes/consultarCliente.html.twig',array('form'=>$form->createView()));  
        
      
      

  }

}

?>
