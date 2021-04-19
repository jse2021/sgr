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
     * @ORM\Column(name="tamano", type="string", length=255, unique=true)
     *@ORM\GeneratedValue(strategy="NONE")
     *@ORM\Id
     */
    private $tamano;

    /**
     * @var string
     *
     * @ORM\Column(name="medidas", type="string", length=255)
     */
    private $medidas;


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
     * Set tamano
     *
     * @param string $tamano
     *
     * @return cancha
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano
     *
     * @return string
     */
    public function getTamano()
    {
        return $this->tamano;
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
     * Set id
     *
     * @param integer $id
     *
     * @return cancha
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
      return $this->tamano;
    }

}
