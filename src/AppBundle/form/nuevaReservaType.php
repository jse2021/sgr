<?php
namespace AppBundle\form;
use AppBundle\Entity\cancha;
use AppBundle\Entity\tipoMonto;
use AppBundle\Entity\reserva;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



/**
 *
 */
class nuevaReservaType extends AbstractType
{

  public function buildForm (FormBuilderInterface $builder, array $options){

    $builder

    -> add('dniCliente',TextType::class)
    -> add('nombre',TextType::class)
    -> add('apellido',TextType::class)
    ->add('Buscar',SubmitType::class, array('label' => 'Buscar'))
    ->add('tamano',EntityType::class, array('class'=>'AppBundle:cancha'))
    ->add('fecha',DateType::class)
    ->add('tipoMonto',EntityType::class, array('class'=>'AppBundle:tipoMonto'))
    -> add('monto',NumberType::class)
  ->add('Guardar',SubmitType::class, array('label' => 'Guardar'))
  ->add('Imprimir',SubmitType::class, array('label' => 'Imprimir'));

}

}


 ?>
