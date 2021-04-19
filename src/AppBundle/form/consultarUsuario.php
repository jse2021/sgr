<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class consultarUsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla tapa*/
        $builder
        ->add('dni', TextType::class)
        ->add('nombre', TextType::class)
        ->add('apellido', TextType::class)
        ->add('password', PasswordType::class)
        ->add('Buscar',SubmitType::class, array('label' => 'Buscar'))
        ->add('Modificar',SubmitType::class, array('label' => 'Modificar'))
        ->add('Eliminar',SubmitType::class, array('label' => 'Eliminar'));


    }
}

?>
