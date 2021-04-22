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
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Validator\Constraints\Length;

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
    $nCliente= new cliente();
    $repository = $this->getDoctrine()->getRepository(Cliente::class);
    /*CONSTRUYENDO FORMULARIO*/
    $form = $this->createForm(nuevoClienteType::class,$nCliente);
    /*Recoger la informacion del submit*/
    $form ->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
          
          $campoDni = $form->getData([0]);
          $clienteBd = $this->getDoctrine()->getRepository('AppBundle:Cliente')
                ->findOneBy(['dni' => $campoDni]);


      if($clienteBd !== null) {
        $this->addFlash('warning',
        'Cliente existente');  
      } else {
        // rellenar el entity cliente
        $cliente = $form->getData();
                
        //almacenar nueva cliente
        $em = $this->getDoctrine()->getManager();
        // objeto a almacenar "cliente"
        $em ->persist($cliente);
        //finalizar comunicacion con bd
        $em->flush();
        $this->addFlash('success',
            'Cliente guardado con éxito');  
            
        
        
        return $this->redirectToRoute('nuevoCliente');
      }

              
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
      
      // obtengo el dni del campo
        $campoDni = $form->getData([0]);            

      // ya obtuve los datos del campo, faltaria comparar si existe en la base de datos, si es asi, traer todos los datos del cliente.
        $cliente = $this->getDoctrine()->getRepository('AppBundle:Cliente')
                ->findOneBy(['dni' => $campoDni]);
      // Si cliente no trae nada, muestra nuevamente la pantalla consulta, sino muestra datos
          if ($cliente === null){
                $this->addFlash('warning',
                                'No existe el cliente');
                                
          } else {
                // Obtengo el dni de la BD
                $dniBaseDatos= $cliente->getDni();
                return $this->render('gestionclientes/Cliente.html.twig',array("cliente" => $cliente));
          }
            
            }
            
        return $this->render('gestionclientes/consultarCliente.html.twig',array('form'=>$form->createView()));  
        
  }

}

?>
