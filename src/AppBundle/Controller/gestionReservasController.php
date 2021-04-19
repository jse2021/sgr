<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\reserva;
use AppBundle\form\nuevaReservaType;
use AppBundle\form\consultarReservaPorClienteType;
use AppBundle\form\consultarReservaPorCanchaType;


/**
 *@Route ("/gestionReservas")
 */
class gestionReservasController extends Controller
{

  /**
   * @Route("/nuevaReserva", name="nuevaReserva")
   */
   public function nuevaReservaAction(Request $request)
  {

            $nReserva = new reserva();
            /*construyo formulario*/
            $form = $this->createForm(nuevaReservaType::class,$nReserva);

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
