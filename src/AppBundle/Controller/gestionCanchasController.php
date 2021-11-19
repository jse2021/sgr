<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\cancha;
use AppBundle\form\nuevaCanchaType;
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
 * @Route("/gestionCanchas")
 */
class gestionCanchasController extends Controller
{
 /**
   * @Route("/nuevaCancha/{nombre}", name="nuevaCancha")
   *
   */

  public function nuevaCanchaAction(Request $request, $nombre = null)
  {
    
  $canchaBd = $this->getDoctrine()->getRepository('AppBundle:Cancha')
  ->findOneBy(['nombre' => $nombre]);
        
      if($nombre) {
            $repository = $this->getDoctrine()->getRepository(Cancha::class);        
            $ncancha = $repository->find($nombre);    
      }else {
           $ncancha = new cancha();
             }

            /*CONSTRUYENDO FORMULARIO*/
              $form = $this->createForm(nuevaCanchaType::class,$ncancha);
            /*Recoger la informacion del submit*/
              $form ->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
                  $campoNombre = $form->getData(['nombre']);
                  $canchaBd = $this->getDoctrine()->getRepository('AppBundle:Cancha')->findOneBy(['nombre' => $campoNombre]);
                 if($canchaBd == $campoNombre){ 
                  // rellenar el entity cliente
                  $cancha = $form->getData();
                  //almacenar nueva cliente
                  $em = $this->getDoctrine()->getManager();
                  // objeto a almacenar "cliente"
                  $em ->persist($cancha);
                  // //finalizar comunicacion con bd
                  $em->flush();
                  $this->addFlash('success',
                  'Cancha actualizada con éxito');          
                  return $this->redirectToRoute('nuevaCancha');
              }

                  if ($canchaBd == null) {
                    // rellenar el entity cliente
                    $cancha = $form->getData();
                    //almacenar nueva cliente
                    $em = $this->getDoctrine()->getManager();
                    // objeto a almacenar "cliente"
                    $em ->persist($cancha);
                    //finalizar comunicacion con bd
                    $em->flush();
                    $this->addFlash('success',
                    'Cancha guardada con éxito');          
                    return $this->redirectToRoute('nuevaCancha');
                } 

                  if($canchaBd) {
                    $this->addFlash('warning',
                    'Cancha existente');  
                   }                                     
                } elseif ($form->isSubmitted() && (!$form->isValid())){
                    $this->addFlash('warning',
                    'Se han encontrado errores en el formulario'); 
    } 
    /*de esta forma habilito para usar las variables en index*/
      return $this->render('gestionCanchas/nuevaCancha.html.twig',array('form' => $form->createView()));
  }

  /**
   * @Route("/consultarCancha/{cancha}", name="consultarCancha" )
   */
  public function consultarCanchaAction(Request $request, $cancha = null)
  {
    $repository = $this->getDoctrine()->getRepository(Cancha::class);
    $form = $this->createForm(consultarClienteType::class);
    $cancha = $this->getDoctrine()->getRepository('AppBundle:Cancha')->findAll();
    return $this->render('gestionCanchas/consultarCancha.html.twig',array('cancha' => $cancha,'form'=>$form->createView()));  
      
  }

  /**
 * @Route("/borrar/{nombre}", name="borrarCancha")
 *
 */
public function borrarCanchaAction(Request $request, $nombre = null){
  if($nombre){
    // Busqueda de la cliente
    $repository = $this->getDoctrine()->getRepository(Cancha::class);
    $cancha = $repository->find($nombre);
    // borrado
    $em = $this->getDoctrine()->getManager();
    $em ->remove($cancha);
    $em->flush();
  }
    return $this->redirectToRoute('consultarCancha');
}
}

?>
