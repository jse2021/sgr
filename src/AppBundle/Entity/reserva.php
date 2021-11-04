<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reserva
 *
 * @ORM\Table(name="reserva")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\reservaRepository")
 */
class reserva {

/**
 * @var int
 *
 * @ORM\Column(name="id", type="integer")
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="AUTO")
 */
private $id;

/**
 * @var int
 *
 * @ORM\Column(name="dniCliente", type="integer")
 */
private $dniCliente;

/**
 * @var \Date
 *
 * @ORM\Column(name="fecha", type="date")
 */
private $fechaReserva;

/**
 * @var \Time
 *
 * @ORM\Column(name="hora", type="time")
 */
private $hora;

/**
 * @var 
 *
 * @ORM\Column(name="monto", type="decimal", precision=30, scale=2)
 */
private $monto;

/**
 * @var string
 *
 * @ORM\Column(name="observaciones", type="string", length=255, nullable = true)
 */
private $observaciones;

/* METODOS GET Y SET */

/**
 * Set dni
 *
 * @param integer $dni
 *
 * @return cliente
 */
public function setDniCliente($dniCliente){
    $this->dniCliente = $dniCliente;
    return $this;
}

/**
 * Get dni
 *
 * @return int
 */
public function getDniCliente(){
    return $this->dniCliente;
}

/**
 * Set fechaReserva
 * @param \Date $fechaReserva
 * @return reserva
 */
public function setFechaReserva($fechaReserva){
    $this->fechaReserva = $fechaReserva;
    return $this;
}

/**
 * Get fechaReserva
 * @return \Date
 */
public function getFechaReserva() {
    return $this->fechaReserva;
}

/**
 * Set hora
 * @param \Time $hora
 * @return reserva
 */
public function setHora($hora){
    $this->hora = $hora;
    return $this;
}

/**
 * Get hora
 *
 * @return \Time
 */
public function getHora() {
    return $this->hora;
}

/**
 * Set monto
 *
 * @param integer $monto
 *
 * @return reserva
 */
public function setMonto($monto) {
    $this->monto = $monto;
    return $this;
}

/**
 * Get monto
 *
 * @return integer
 */
public function getMonto() {
    return $this->monto;
}

/**
 * Set observaciones
 * @param string $observaciones
 * @return reserva
 */
public function setObservaciones($observaciones) {
    $this->observaciones = $observaciones;
    return $this;
}

/**
 * Get observaciones
 * @return string
 */
public function getObservaciones() {
    return $this->observaciones;
}

/**
 * Get id
 *
 * @return int
 */
public function getId() {
    return $this->id;
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
* @ORM\JoinColumn(name="nombreCancha", referencedColumnName="nombre")
*/
private $cancha;

/**
*
* @ORM\ManyToOne(targetEntity="tipoMonto", inversedBy="reserva")
* @ORM\JoinColumn(name="tipoMonto", referencedColumnName="descripcion")
*/
private $tipoMonto;

/**
 * Set usuario
 *
 * @param \AppBundle\Entity\usuario $usuario
 *
 * @return reserva
 */
public function setUsuario(\AppBundle\Entity\usuario $usuario = null) {
    $this->usuario = $usuario;
    return $this;
}

/**
 * Get usuario
 * @return \AppBundle\Entity\usuario
 */
public function getUsuario() {
    return $this->usuario;
}

/**
 * Set cliente
 *
 * @param \AppBundle\Entity\cliente $cliente
 *
 * @return reserva
 */
public function setCliente(\AppBundle\Entity\cliente $cliente = null) {
        $this->cliente = $cliente;
        return $this;
}

/**
 * Get cliente
 *
 * @return \AppBundle\Entity\cliente
 */
public function getCliente() {
    return $this->cliente;
}

/**
 * Set cancha
 *
 * @param \AppBundle\Entity\cancha $cancha
 *
 * @return reserva
 */
public function setCancha(\AppBundle\Entity\cancha $cancha = null) {
    $this->cancha = $cancha;
    return $this;
}

/**
 * Get cancha 
 * @return \AppBundle\Entity\cancha
 */
public function getCancha() {
    return $this->cancha;
}

/**
 * Set tipoMonto
 *
 * @param string $tipoMonto
 *
 * @return reserva
 */
public function setTipoMonto($tipoMonto) {
    $this->tipoMonto = $tipoMonto;

    return $this;
}

/**
 * Get tipoMonto
 *
 * @return string
 */
public function getTipoMonto() {
    return $this->tipoMonto;
}


}
