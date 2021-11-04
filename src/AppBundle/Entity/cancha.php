<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cancha
 *
 * @ORM\Table(name="cancha")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\canchaRepository")
 */
class cancha
{
    

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     *@ORM\GeneratedValue(strategy="NONE")
     *@ORM\Id
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="medidas", type="string", length=255)
     */
    private $medidas;


    
    /**
     * Set tamano
     *
     * @param string $nombre
     *
     * @return cancha
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set medidas
     *
     * @param string $medidas
     *
     * @return cancha
     */
    public function setMedidas($medidas)
    {
        $this->medidas = $medidas;

        return $this;
    }

    /**
     * Get medidas
     *
     * @return string
     */
    public function getMedidas()
    {
        return $this->medidas;
    }


       /*una cancha tiene muchas reservas*/
        /**
         * @ORM\OneToMany(targetEntity="reserva", mappedBy="cancha")
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
     * Add reserva
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return cancha
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

    //conversion a cadena
    public function __toString()
    {
      return $this->nombre;
    }

}
