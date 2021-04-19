<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tipo_monto
 *
 * @ORM\Table(name="tipo_monto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\tipoMontoRepository")
 */
class tipoMonto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     *
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=128, unique=true)
     *@ORM\GeneratedValue(strategy="NONE")
     *@ORM\Id
     */
    private $descripcion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return tipoMonto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    //conversion a cadena
    public function __toString()
    {
      return $this->descripcion;
    }


    /*RELACION ENTRE TABLAS*/
    /**
     * @ORM\OneToMany(targetEntity="reserva", mappedBy="tipoMonto")
     */
    private $reserva;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reserva = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return tipoMonto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return tipoMonto
     */
    public function addReserva(\AppBundle\Entity\reserva $reserva)
    {
        $this->reserva[] = $reserva;

        return $this;
    }

    /**
     * Remove reserva
     *
     * @param \AppBundle\Entity\reserva $reserva
     */
    public function removeReserva(\AppBundle\Entity\reserva $reserva)
    {
        $this->reserva->removeElement($reserva);
    }

    /**
     * Get reserva
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReserva()
    {
        return $this->reserva;
    }
}
