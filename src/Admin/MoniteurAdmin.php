<?php
namespace App\Admin;

use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\AdminType;

final class MoniteurAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper 
             ->tab('Moniteur')

            ->with('Content', ['class' => 'col-md-9'])

          
           
            ->add('cin', TextType::class)
            ->add('passport', TextType::class)
            ->add('address', TextType::class)
            ->add('postalcode', TextType::class)
            ->add('city', TextType::class)
           
            ->add('recruitmentDate', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',])
                ->add('category',EntityType::class,[
                    'class' =>Category::class,
                    'choice_label'=>'name',
                ])
                ->end()
                ->end()
                ->tab("User")
               ->add('user', AdminType::class)
               ->end()
           


            ->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('cin');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper//->addIdentifier('nom')
            //->addIdentifier('prenom')
            //->addIdentifier('dateNaissance')
            //->addIdentifier('sex')
            ->addIdentifier('cin')
            ->addIdentifier('passport')
            ->addIdentifier('address')
            ->addIdentifier('postalcode')
            ->addIdentifier('city')
            //->addIdentifier('telephone')
            ->addIdentifier('recruitmentDate')
           // ->addIdentifier('voiture')
           // ->addIdentifier('category.name')
           // ->addIdentifier('category')



        ;
    }

}