<?php
namespace App\Application\Sonata\UserBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\UserBundle\Model\UserInterface;
 
use FOS\UserBundle\Model\UserManagerInterface;
use Doctrine\DBAL\Types\TextType;

class UserAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper->add('firstname', TextType::class, array('required' => false));
    }
}
