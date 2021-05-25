<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class nuevoClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla cliente*/
        $builder
        ->add('dni', NumberType::class,['invalid_message'=>'Se ingresaron datos invalidos'])
        
        ->add('nombre', TextType::class )
        ->add('apellido', TextType::class)
        ->add('email', EmailType::class)
        ->add('celular', NumberType::class,['invalid_message'=>'Se ingresaron datos invalidos'])
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'));


    }
}

?>
