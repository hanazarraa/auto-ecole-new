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



final class MoniteurAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->with('Content', ['class' => 'col-md-9'])

            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('sex',TextType::class)
            ->add('date_naissance', DateType::class, [
                    'widget' => 'single_text',
                    // this is actually the default format for single_text
                    'format' => 'yyyy-MM-dd',]
            )
            ->add('cin', TextType::class)
            ->add('passport', TextType::class)
            ->add('adresse', TextType::class)
            ->add('codePostal', TextType::class)
            ->add('ville', TextType::class)
            ->add('telephone', TextType::class)

            ->add('Date_de_recrutement', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',])
            ->add('voiture', TextType::class)
            ->add('category',EntityType::class,[
                'class' =>Category::class,
                'choice_label'=>'name',
            ])


            ->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom')
            ->addIdentifier('prenom')
            ->addIdentifier('dateNaissance')
            ->addIdentifier('sex')
            ->addIdentifier('cin')
            ->addIdentifier('passport')
            ->addIdentifier('adresse')
            ->addIdentifier('codePostal')
            ->addIdentifier('ville')
            ->addIdentifier('telephone')
            ->addIdentifier('Date_de_recrutement')
            ->addIdentifier('voiture')
            ->addIdentifier('category.name')
            ->addIdentifier('category')



        ;
    }

}