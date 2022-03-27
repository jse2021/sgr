<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\reserva;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * @Route("/api")
*/
class apiController extends Controller
{
    /**
     * @Route("/listarReservas",methods={"GET"})
     */
    public function listaReservasAction(){
        $repository = $this->getDoctrine()->getRepository(Reserva::class);
        $reservas = $repository->findAll();
        $reservasArray=array();
        foreach($reservas as $reserva){
            $reservaArray=array();
            $reservaArray['id']=$reserva->getId();
            $reservaArray['monto']=$reserva->getMonto();
            $reservaArray['fecha']=$reserva->getFechaReserva();
            $reservaArray['dniCliente']=$reserva->getdniCliente();
            $reservaArray['nombreCancha']=$reserva->getCancha();
            $reservaArray['observaciones']=$reserva->getObservaciones();
            $reservaArray['tipoMonto']=$reserva->getTipoMonto();
            $reservasArray[]=$reservaArray;
        }

        $response = new JsonResponse($reservasArray);
        return $response;
    }
    
}

?>




