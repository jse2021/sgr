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
use Symfony\Component\BrowserKit\Response;
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
   * @Route("/consultarCliente", name="consultarCliente" )
   */
  public function consultarClienteAction(Request $request)
  {
$repository = $this->getDoctrine()->getRepository(Cliente::class);
$form = $this->createForm(consultarClienteType::class);
$form ->handleRequest($request);
    
     if ($form->isSubmitted() && $form->isValid()) { 
         // obtengo el dni del campo
         $campoDni = $form->getData(['dni']);            
         // Si cliente no trae nada, muestra nuevamente la pantalla consulta, sino muestra datos
         $cliente = $this->getDoctrine()->getRepository('AppBundle:Cliente')
         ->findOneBy(['dni' => $campoDni]);
      
           if ($cliente === null){
             $this->addFlash('warning','No existe el cliente');                     
             } else { 
             return $this->render('gestionclientes/Cliente.html.twig',array("cliente" => $cliente));
         }
           } 
             return $this->render('gestionclientes/consultarCliente.html.twig',array('form'=>$form->createView()));  
  }


  /**
   * @Route("/nuevoCliente/{dni}", name="nuevoCliente")
   *
   */

  public function nuevoClienteAction(Request $request, $dni = null)
  {
    
  $clienteBd = $this->getDoctrine()->getRepository('AppBundle:Cliente')
  ->findOneBy(['dni' => $dni]);
        
      if($dni){
            $repository = $this->getDoctrine()->getRepository(Cliente::class);        
            $ncliente = $repository->find($dni);    
        }else {
           $ncliente = new cliente();
             }

            /*CONSTRUYENDO FORMULARIO*/
              $form = $this->createForm(nuevoClienteType::class,$ncliente);
            /*Recoger la informacion del submit*/
              $form ->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
                  $campoDni = $form->getData(['dni']);
                  $clienteBd = $this->getDoctrine()->getRepository('AppBundle:Cliente')
                  ->findOneBy(['dni' => $campoDni]);
                  
                 if($clienteBd == $campoDni){ 
                  // rellenar el entity cliente
                  $cliente = $form->getData();
                  //almacenar nueva cliente
                  $em = $this->getDoctrine()->getManager();
                  // objeto a almacenar "cliente"
                  $em ->persist($cliente);
                  // //finalizar comunicacion con bd
                  $em->flush();
                  $this->addFlash('success',
                  'Cliente actualizado con éxito');          
                  return $this->redirectToRoute('nuevoCliente');
              }

                  if ($clienteBd == null) {
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

                  if($clienteBd) {
                    $this->addFlash('warning',
                    'Cliente existente');  
                   }                                     
                } elseif ($form->isSubmitted() && (!$form->isValid())){
                    $this->addFlash('warning',
                    'Se han encontrado errores en el formulario'); 
    } 
    /*de esta forma habilito para usar las variables en index*/
      return $this->render('gestionClientes/nuevoCliente.html.twig',array('form' => $form->createView()));
  }

/**
 * @Route("/borrar/{dni}", name="borrarCliente")
 *
 */
public function borrarClienteAction(Request $request, $dni = null){

if($dni)
{
    // Busqueda de la cliente
    $repository = $this->getDoctrine()->getRepository(Cliente::class);
    $cliente = $repository->find($dni);
    // borrado
    $em = $this->getDoctrine()->getManager();
    $em ->remove($cliente);
    $em->flush();

}
    return $this->redirectToRoute('consultarCliente');
}
}

?>
