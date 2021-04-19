<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reserva
 *
 * @ORM\Table(name="reserva")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\reservaRepository")
 */
class reserva
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
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=2, scale=0)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_inicio", type="datetime")
     */
    private $horaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_fin", type="datetime")
     */
    private $horaFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reserva", type="datetime")
     */
    private $fechaReserva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @var int
     *
     * @ORM\Column(name="dni", type="integer")
     *
     *
     */
    private $dniCliente;
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

        /**
         * @var string
         *
         * @ORM\Column(name="tamano", type="string", length=255)
         */
        private $tamano;


        /**
         * @var string
         *
         * @ORM\Column(name="tipo_Monto", type="string", length=255)
         */
        private $tipo_Monto;


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
         * Get tipoMonto
         *
         * @return string
         */
        public function getTipoMonto()
        {
            return $this->tipoMonto;
        }

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
     * Set monto
     *
     * @param string $monto
     *
     * @return reserva
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return reserva
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     *
     * @return reserva
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     *
     * @return reserva
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set fechaReserva
     *
     * @param \DateTime $fechaReserva
     *
     * @return reserva
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * Get fechaReserva
     *
     * @return \DateTime
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return reserva
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return reserva
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return cliente
     */
    public function setDniCliente($dni)
    {
        $this->dniCLiente = $dniCliente;

        return $this;
    }

    /**
     * Get dni
     *
     * @return int
     */
    public function getDniCliente()
    {
        return $this->dniCliente;
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
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

/*RELACIONO ENTRE TABLAS*/

/*un cliente pude tener o solicitar muchas reservas*/
/**
 * @ORM\ManyToOne(targetEntity="cliente", inversedBy="reserva")
 * @ORM\JoinColumn(name="dniCliente", referencedColumnName="dni")
 */
private $cliente;

/**
*
* @ORM\ManyToOne(targetEntity="cancha", inversedBy="reserva")
* @ORM\JoinColumn(name="tamano", referencedColumnName="tamano")
*/
private $cancha;


/**
*
* @ORM\ManyToOne(targetEntity="tipoMonto", inversedBy="reserva")
* @ORM\JoinColumn(name="tipo_Monto", referencedColumnName="descripcion")
*/
private $tipoMonto;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return reserva
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return reserva
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Set tamano
     *
     * @param string $tamano
     *
     * @return reserva
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\usuario $usuario
     *
     * @return reserva
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
     * Set cliente
     *
     * @param \AppBundle\Entity\cliente $cliente
     *
     * @return reserva
     */
    public function setCliente(\AppBundle\Entity\cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set cancha
     *
     * @param \AppBundle\Entity\cancha $cancha
     *
     * @return reserva
     */
    public function setCancha(\AppBundle\Entity\cancha $cancha = null)
    {
        $this->cancha = $cancha;

        return $this;
    }

    /**
     * Get cancha
     *
     * @return \AppBundle\Entity\cancha
     */
    public function getCancha()
    {
        return $this->cancha;
    }

    /**
     * Set tipoMonto
     *
     * @param string $tipoMonto
     *
     * @return reserva
     */
    public function setTipoMonto($tipoMonto)
    {
        $this->tipo_Monto = $tipoMonto;

        return $this;
    }
}
