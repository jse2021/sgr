<?php
namespace AppBundle\form;
use AppBundle\Entity\cancha;
use AppBundle\Entity\horarios;
use AppBundle\Entity\tipoMonto;
use AppBundle\Entity\reserva;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Entity;

class seleccionCanchaType extends AbstractType
{
  
  public function buildForm (FormBuilderInterface $builder, array $options) {    
    $builder
        ->add('cancha',EntityType::class, array('class'=>'AppBundle:cancha',
        'placeholder'=>' ',
        'label' => 'Cancha', 
        'attr' => [
        'id' => 'id_cancha',       
        ],));
    }
  }
 ?>

