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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


/**
 *
 */
class nuevaReservaType extends AbstractType
{

  public function buildForm (FormBuilderInterface $builder, array $options) {

    $builder
        ->add('cliente', EntityType::class, [
          'class' => 'AppBundle:Cliente',
          'mapped' =>true,
          'placeholder' => 'Seleccione un cliente' ,
          'required' => true,
          'label' => 'Cliente ',
          'choice_label' => function($cliente) {
            return $cliente->getDni().' ' .$cliente->getNombre(). ' '. $cliente->getApellido();
        },
        ])
        ->add('cancha',EntityType::class, array('class'=>'AppBundle:cancha','label' => 'Cancha'))

        ->add('fecha_reserva',DateType::class, array(
          'widget' => 'single_text',
          'label' => 'Reserva',
          
          // 'attr' => array('class'=>'Calendar', 'read_only' => true)
      ))
      ->add('hora', TimeType::class, [
        'input'  => 'datetime',
        'widget' => 'single_text',
        ])
        ->add('tipoMonto',EntityType::class, array('class'=>'AppBundle:tipoMonto','label' => 'Estado','mapped' =>true))
        ->add('monto',NumberType::class,['invalid_message'=>'Se ingresaron datos invalidos'],array('label' => 'Monto $ ',
        'precision' => 30))
        ->add('observaciones',TextareaType::class, [
          'required' => false,
          'empty_data' => "",
        ])
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'))
        ->add('Imprimir',SubmitType::class, array('label' => 'Imprimir'));
    }

}


 ?>
