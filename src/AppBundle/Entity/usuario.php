<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\usuarioRepository")
 */
class usuario implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @Assert\Regex(
     *      pattern="/\d/",
     *      match=false,
     *      message = "El nombre no puede contener numeros")
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     ** @Assert\Regex(
     *      pattern="/\d/",
     *      match=false,
     *      message = "El apellido no puede contener numeros")
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
     * @ORM\Column(type="string", length=64, unique=true)
     * @ORM\Id
     */
    private $username;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=64)
     */
      private $plainPassword;
        
    /**
     * @ORM\Column(type="string", length=64)
     */
      private $password;

   /** 
     * @ORM\Column(type="string", length=254)
     */
      private $roles;

    /*
     * @ORM\Column(name="is_active", type="boolean")
     */
      private $isActive;


     public function __construct()
     {
        $this->isActive = true;
     }

     public function setUsername($username)
     {
        return $this->username=$username;
     }

     public function getUsername()
     {
        return $this->username;
     }

     public function getSalt()
     {
        return null;
     }

     public function getPlainPassword()
     {
        return $this->plainPassword;
     }

     public function setPlainPassword($password)
     {
        $this->plainPassword = $password;
     }

     public function setPassword($password)
     {
        return $this->password=$password;
     }

     public function getPassword()
     {
        return $this->password;
     }
     public function setRoles($roles)
     {
         $roles_json=json_encode($roles);
         return $this->roles=$roles_json;
     }

     public function getRoles()
     {
       /*toma el tipo de rol del usuario cuando
       se loguea*/
       $roles=json_decode($this->roles);
       return $roles;
     }

      public function eraseCredentials()
      {
      }

    /** |@see \Serializable::serialize() */
        public function serialize()
        {
         return serialize([
         $this->username,
         $this->password,
        ]);
        }
    /** @see \Serializable::unserialize() */
        public function unserialize($serialized)
        {
        list (
         $this->username,
         $this->password,
         ) = unserialize($serialized, ['allowed_classes' => false]);
         }



/*RELACION ENTRE TABLAS DE LA BASE DE DATOS*/
   /**
    * @ORM\OneToMany(targetEntity="cliente", mappedBy="usuario")
    */
   private $cliente;
    
   /**
     * @ORM\OneToMany(targetEntity="reserva", mappedBy="usuario")
     */
    private $reserva;

    /**
     * Add cliente
     *
     * @param \AppBundle\Entity\cliente $cliente
     *
     * @return usuario
     */
      public function addCliente(\AppBundle\Entity\cliente $cliente)
      {
        $this->cliente[] = $cliente;
        return $this;
      }

    /**
     * Remove cliente
     *
     * @param \AppBundle\Entity\cliente $cliente
     */
    public function removeCliente(\AppBundle\Entity\cliente $cliente)
    {
       $this->cliente->removeElement($cliente);
    }

    /**
     * Get cliente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCliente()
    {
      return $this->cliente;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return usuario
     */
    public function setIsActive($isActive)
    {
      $this->isActive = $isActive;
      return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
       return $this->isActive;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\reserva $reserva
     *
     * @return usuario
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return usuario
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
     * @return usuario
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
     * @return usuario
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return integer
     */
    public function getCelular()
    {
        return $this->celular;
    }
}
