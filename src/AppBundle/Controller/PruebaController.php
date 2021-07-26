<?php
namespace AppBundle\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Repository\usuarioRepository;

/**
 * @Route("/prueba")
 */
class PruebaController extends Controller
{
    /**
     * @Route("/native-query", name="native-query")
     */
    public function pruebaNativeQuery()
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->obtenerNativeQueryDePrueba();

        // Devuelto en formato JSON
        $response = new Response();
        $response->setContent(json_encode($usuarios));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}