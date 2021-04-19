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
class consultarReservaPorCanchaType extends AbstractType
{

  public function buildForm (FormBuilderInterface $builder, array $options){

    $builder



    ->add('tamano',EntityType::class, array('class'=>'AppBundle:cancha'))

    /*Ver luego, que variable usar para que muestre la disponibilidades
    en el calendario, ya que hay dos variables fechas*/
    ->add('fecha',DateType::class)
    ->add('Buscar',SubmitType::class, array('label' => 'Buscar'));


}

}


 ?>
