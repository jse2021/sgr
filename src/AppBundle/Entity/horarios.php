<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * horarios
 *
 * @ORM\Table(name="horarios")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\horariosRepository")
 */
class horarios
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Time
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /*RELACION ENTRE TABLAS*/
    /**
     * @ORM\OneToMany(targetEntity="reserva", mappedBy="horarios")
     */
    private $reserva;
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hora.
     *
     * @param \Time $hora
     *
     * @return horarios
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora.
     *
     * @return \Time
     */
    public function getHora()
    {
        return $this->hora;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reserva = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reserva.
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return horarios
     */
    public function addReserva(\AppBundle\Entity\reserva $reserva)
    {
        $this->reserva[] = $reserva;

        return $this;
    }

    /**
     * Remove reserva.
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReserva(\AppBundle\Entity\reserva $reserva)
    {
        return $this->reserva->removeElement($reserva);
    }

    /**
     * Get reserva.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReserva()
    {
        return $this->reserva;
    }
    
    
    
   
}
