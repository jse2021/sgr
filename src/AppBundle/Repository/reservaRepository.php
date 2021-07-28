<?php

namespace AppBundle\Repository;
use Doctrine\ORM\Query\ResultSetMapping;
/**
 * reservaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class reservaRepository extends \Doctrine\ORM\EntityRepository
{

    function obtenerNativeQueryDeReserva()
    {
        $em = $this->getEntityManager();

        $rsm = new ResultSetMapping();
        // Las columnas que necesitás
        $rsm->addScalarResult('fecha_reserva', 'fecha_reserva');
        $rsm->addScalarResult('hora', 'hora');
        

        // Consulta nativa
        $query = $em->createNativeQuery(
            "SELECT * FROM reserva",
            $rsm
        );

        return $query->getResult();
    }

}
