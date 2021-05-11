<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class usuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla usuario*/
        $builder
        ->add('username', TextType::class)
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'first_options'  => ['label' => 'Contraseña'],
            'second_options' => ['label' => 'Repetir Contraseña'],
        ])
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'));
    }
}

?>
