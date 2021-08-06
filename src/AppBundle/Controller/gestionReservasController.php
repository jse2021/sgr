<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\reserva;
use AppBundle\form\nuevaReservaType;
use AppBundle\form\consultarReservaPorClienteType;
use AppBundle\form\consultarReservaPorCanchaType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Repository\reservaRepository;
use Symfony\Component\Validator\Constraints\Length;

/**
 *@Route ("/gestionReservas")
 */

class gestionReservasController extends Controller 
{
  /**
   * @Route("/buscoCancha", name="buscoCancha")
   */
  public function pruebaNativeQuery(Request $request)
  {
   
      $x = "chica";   
      $array = array();
      $canchaJson = $request->request->get('test');   
      $reservas = $this->getDoctrine()->getRepository('AppBundle:Reserva')->obtenerNativeQueryDeReserva($x);
      // Devuelto en formato JSON
      $response = new Response();
      $response->setContent(json_encode($reservas));
      $response->headers->set('Content-Type', 'application/json');
      dump($response);
      
      return $response;
  }
  /**
   * @Route("/nuevaReserva", name="nuevaReserva")
   */
   public function nuevaReservaAction(Request $request) {     
   $nReserva = new reserva();
   $form = $this->createForm(nuevaReservaType::class,$nReserva);       
   $this->pruebaNativeQuery($request);
   
   $form ->handleRequest($request);    
   if ($form->isSubmitted() && $form->isValid()) {
      $reserva = $form->getData();
      $nombre = $form->getData(['nombre']);
      dump($nombre);
      $em = $this->getDoctrine()->getManager();
      $em ->persist($reserva,$nombre);
      $em->flush();
      $this->addFlash('success','Reserva creada con éxito');          
    
    return $this->redirectToRoute('nuevaReserva');
    } 
   
    return $this->render('gestionReservas/nuevaReserva.html.twig',array('form' => $form->createView()));
  }

  /**
   * @Route("/consultarReservaPorCliente", name="consultarReservaPorCliente")
   */
  public function consultarReservaPorClienteAction(Request $request){
    $nReserva = new reserva();
    /*construyo formulario*/
    $form = $this->createForm(consultarReservaPorClienteType::class,$nReserva);
    
    return $this->render('gestionReservas/consultarReservaPorCliente.html.twig',array('form' => $form->createView()));
  }

  /**
   * @Route("/detalleReservasDelCliente", name="detalleReservasDelCliente")
   */
   public function detalleReservasDelClienteAction(Request $request)
  {
      // replace this example code with whatever you need
      return $this->render('gestionReservas/detalleReservasDelCliente.html.twig');
  }

  /**
   * @Route("/consultarReservaPorCancha", name="consultarReservaPorCancha")
   */
   public function consultarReservasPorCanchaAction(Request $request)
  {
    $nReserva = new reserva();
    /*construyo formulario*/
    $form = $this->createForm(consultarReservaPorCanchaType::class,$nReserva);
      // replace this example code with whatever you need
      return $this->render('gestionReservas/consultarReservaPorCancha.html.twig',array('form' => $form->createView()));
  }
}

?>


