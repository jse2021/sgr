<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\clienteRepository")
 */
class cliente
{

   

    /**
     * @var int
     * @Assert\Length(min=8,
     *                max=8,
     *                exactMessage ="El dni debe contener exactamente 8 caracteres"
     * )
     * @ORM\Column(name="dni", type="integer", unique=true, nullable = false)
     *@ORM\GeneratedValue(strategy="NONE")
     *@ORM\Id
     *
     */
    private $dni;

    /**
     * @var string
     *
     * @Assert\Regex(
     *      pattern="/\d/",
     *      match=false,
     *      message = "El nombre no puede contener numeros")
     * 
     * 
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     ** @Assert\Regex(
     *      pattern="/\d/",
     *      match=false,
     *      message = "El apellido no puede contener numeros")
     * 
     * 
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var int
     * @Assert\Length(min=10,
     *                max=10,
     *                exactMessage ="El celular debe contener exactamente 10 caracteres"
     * )
     * @ORM\Column(name="celular", type="string",length=10)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return cliente
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return int
     */
    public function getDni()
    {
        return $this->dni;
    }




    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return cliente
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return cliente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set celular
     *
     * @param integer $celular
     *
     * @return cliente
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return int
     */
    public function getCelular()
    {
        return $this->celular;
    }

/*RELACION ENTRE TABLAS*/
// ...
  
   /*un cliente realiza muchas reservas*/
    /**
     * @ORM\OneToMany(targetEntity="reserva", mappedBy="cliente")
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
     * Set usuario
     *
     * @param \AppBundle\Entity\usuario $usuario
     *
     * @return cliente
     */
    public function setUsuario(\AppBundle\Entity\usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return cliente
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
