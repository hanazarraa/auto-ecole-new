<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Vehicule;
final class VehiculeAdmin extends AbstractAdmin
{
      /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('numero_matricule', TextType::class,['required' => true])
                   ->add('marque',TextType::class,['required' => true])
                   ->add('type',TextType::class,['required' => true]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('numero_matricule')
                        ->add('marque')
                        ->add('type');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('numero_matricule')
                    ->add('marque')
                    ->add('type');
    }
}