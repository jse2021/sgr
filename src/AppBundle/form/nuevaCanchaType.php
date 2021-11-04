<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class nuevaCanchaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla cancha*/
        $builder
        ->add('nombre', TextType::class )
        ->add('medidas', TextType::class )
        ->add('Guardar',SubmitType::class, array('label' => 'Guardar'));
    }
}

?>