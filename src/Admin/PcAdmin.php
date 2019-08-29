<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Pc;
final class PcAdmin extends AbstractAdmin
{
      /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('marque', TextType::class,['required' => true])
                   ->add('modele',TextType::class,['required' => true]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('marque')
                        ->add('modele');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('marque')
                    ->add('modele');
    }
}