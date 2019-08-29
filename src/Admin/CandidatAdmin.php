<?php
namespace App\Admin;
use App\Entity\Category;
use App\Entity\SeanceCode;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Candidat;
use App\Application\Sonata\UserBundle\Entity\User;
use App\Application\Sonata\UserBundle\Admin\UserAdmin as UserAdmin;
use App\Form\SeanceConduiteType;
use Sonata\AdminBundle\Form\Type\AdminType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
//use App\Entity\SeanceConduite;
//use App\Admin\SeanceConduiteAdmin;

final class CandidatAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {   //UserAdmin::configureFormFields($formMapper);
       // $formMapper->end();
        $formMapper
            ->tab('Candidat')
            ->with('Content', ['class' => 'col-md-9'])
           /* ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('gender', ChoiceType::class, [
                'choices'  => Candidat::getGenderList()]
            )
            ->add('date_naissance', DateType::class, [
                    'widget' => 'single_text',
                    // this is actually the default format for single_text
                    'format' => 'yyyy-MM-dd',]
            )*/
            ->add('cin', TextType::class)
            ->add('address', TextType::class)
            ->add('postalcode', TextType::class)
            ->add('city', TextType::class)
           

            ->end()
            ->with('Content', ['class' => 'col-md-9'])
           /* ->add('Category',EntityType::class,[
                'class' =>Category::class,
                'choice_label'=>'name',
            ])*/
            ->add('ImageFile', FileType::class, ['required' => true])
            ->add('SeanceConduite', CollectionType::class, [
                'by_reference' => false, // Use this because of reasons
                'allow_add' => true, // True if you want allow adding new entries to the collection
                'allow_delete' => true, // True if you want to allow deleting entries
                'prototype' => true, // True if you want to use a custom form type
                
                'entry_type' =>SeanceConduiteType::class   // Form type for the Entity that is being attached to the object
            ])
            ->end()
            ->end()
            ->tab('User')
            
            ->add('user',AdminType::class)
            ->end()
            ->end();
           
           
            
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('cin');
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        UserAdmin::configureListFields($listMapper);
        $listMapper->//addIdentifier('nom')
            //->addIdentifier('prenom')
            addIdentifier('cin')
            ->addIdentifier('address')
            ->addIdentifier('postalcode')
            ->addIdentifier('city')
            //->addIdentifier('telephone')
            //->addIdentifier('dateNaissance')
           // ->addIdentifier('seance')
            ->addIdentifier('category.name')
            ->addIdentifier('Category')
           // ->add('ImageName')
           // ->add('ImageFile')
          //  ->addIdentifier('gender')
            ;
    }
   
}