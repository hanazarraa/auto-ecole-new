<?php
namespace App\Admin;
use App\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelType;


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


final class CandidatAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            
            ->with('Informations du Candidat', ['class' => 'col-md-5'])
            //->add('lastname', TextType::class)
           // ->add('firstname', EntityType::class,[
             //   'class' =>User::class,])
            
            //->add('username',TextType::class)
           // ->add('cin', TextType::class)
            ->add('address', TextType::class)
            ->add('postalcode', TextType::class)
            ->add('city', TextType::class)
            //->add('phone', TextType::class)
            ->add('ImageFile', FileType::class, ['required' => true])
            ->end()
            ->with('Category du permis',['class' => 'col-md-5'])
            ->add('category',ModelType::class,[
                'required' => true,
                'expanded' => true,
                'btn_add'=>'Add',
              
            ])
            ->end()
            
            
            ->with('Informations Utilisateur',['class' => 'col-md-5'])
            ->add('user',ModelType::class,
                
            ['property' => 'username','btn_add'=>'Add new'])
            
            //->add('user.username',TextType::class,['required'=>true])

            
            
           
            
            ->end();


    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->//add('cin')
                       add('user.firstname')
                       ->add('user.lastname')
                       ->add('user.username');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('user.username',null,['label'=>'User Name'])
            ->addIdentifier('user.lastname',null,['label'=>'Last Name'])
            ->addIdentifier('user.firstname',null,['label'=>'First Name'])
            ->addIdentifier('user.gender',null,['label'=>'Gender'])
          //  ->addIdentifier('cin')
            ->addIdentifier('address')
            ->addIdentifier('postalcode')
            ->addIdentifier('city')
           ->addIdentifier('user.phone',null,['label'=>'Phone Number'])
           ->addIdentifier('user.date_of_birth','date',['label' => 'Date of Birth'])
           // ->addIdentifier('date_birth')
            ->addIdentifier('category.name',null,['label'=>'Category'])
            //->addIdentifier('Category')
            //->add('ImageName')
            ->add('ImageFile')
            
            ;

    }
   

}
