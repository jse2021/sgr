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

     public function getRoles()
     {
        return ['ROLE_USER'];
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
}
