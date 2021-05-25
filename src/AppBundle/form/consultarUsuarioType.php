<?php
namespace AppBundle\form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class consultarUsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*trae los nombres de los campos de la tabla tapa*/
        $builder
        ->add('username', TextType::class)
        ->add('Buscar',SubmitType::class, array('label' => 'Buscar'));
    }
}

?>
