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
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Mapping as ORM;


/**
 *@Route ("/gestionReservas")
 */

class gestionReservasController extends Controller 
{
  /**
   * @Route("/nuevaReserva", name="nuevaReserva")
   */
   public function nuevaReservaAction(Request $request) {     
    
   $nReserva = new reserva();
   $form = $this->createForm(nuevaReservaType::class,$nReserva);      
    $em = $this->getDoctrine()->getManager();
    $data = $em->getRepository(Reserva::class)->findAll();
    

    // $response = new JsonResponse();
    //   foreach($data as $reserva) {
    //     $response->setData(array(
    //     'fecha_reserva' => $reserva->getfechaReserva(),
    //     'fecha' => $reserva->gethora(),
    //     ));
    // }
    // return new JsonResponse($response);
    
    // foreach($data as $reserva) {
    //   $arrayCollection[] = array(
    //       'fecha_reserva' => $reserva->getfechaReserva(),
    //       'fecha' => $reserva->gethora(),
    //   );
      
    // }
    //   return new JsonResponse($arrayCollection);

      // $query = $em->createQuery(
      //     '
      //       SELECT
      //             r.fecha_reserva, r.hora
      //       FROM
      //             AppBundle\Entity\reserva.php r
      //       '
      // );
      //       $result = $query->getResult();


    
          //   public function getAllCategoryAction() {
          //     $em = $this->getDoctrine()->getManager();
          //     $query = $em->createQuery(
          //         'SELECT c
          //         FROM AppBundle:Categoria c'
          //     );
          //     $categorias = $query->getArrayResult();
          
          //     $response = new Response(json_encode($categorias));
          //     $response->headers->set('Content-Type', 'application/json');
          
          //     return $response;
          // }



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
   public function consultarReservaPorClienteAction(Request $request)
  {
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

<script>
      $(document).ready(function (){
        pulsacion();
      });

      function pulsacion() {
        $("#nueva_reserva_cancha").click(function (){
          var Vcancha = {cancha:$("#nueva_reserva_cancha").val()}
          console.log(Vcancha);
        });

        }
    </script>