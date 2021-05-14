<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class usuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla usuario*/
        $builder
        ->add('nombre', TextType::class)
        ->add('apellido', TextType::class)
        ->add('celular', NumberType::class)
        ->add('username', TextType::class,array('label' => 'Usuario'))
        ->add('plainPassword', RepeatedType::class, [
              'type' => PasswordType::class,
              'first_options'  => ['label' => 'Contraseña'],
              'second_options' => ['label' => 'Repetir Contraseña'],
        ])
        ->add('roles', ChoiceType::class, [
              'multiple' => true,
              'expanded' => true, 
              'choices' => [
              'Estandar' => 'ROLE_USER',
              'Administrador' => 'ROLE_ADMIN',
    ],
])
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'));
        
    }
}

?>


