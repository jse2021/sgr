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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
        ->add('cancha',EntityType::class, array('class'=>'AppBundle:cancha',
        'label' => 'Cancha', 
        'attr' => [
        'id' => 'id_cancha',       
      ],
        
        ))

        ->add('fecha_reserva', DateType::class, array(
          'attr' => [
            'class' => 'form-control input-inline datepicker',
            'id' => 'datepicker',
            'data-provide' => 'datepicker',
        ],
          'widget' => 'single_text',
          'label' => 'Reserva',
          'required' => true,
          'html5' => false,
          
        ))
      ->add('hora', TimeType::class, array( 
        'attr'=> [
        'class' => 'form-control timepicker', 
      ],
        // 'input'  => 'datetime',
        'widget' => 'single_text',
        'html5' => false,
        ))
        ->add('tipoMonto',EntityType::class, array('class'=>'AppBundle:tipoMonto','label' => 'Estado','mapped' =>true))
        ->add('monto',NumberType::class,['invalid_message'=>'Se ingresaron datos invalidos'],array('label' => 'Monto $ ',
        'precision' => 30))
        ->add('observaciones',TextareaType::class, [
          'required' => false,
          'empty_data' => "",
        ])
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'));
    }
    

  }
 ?>

