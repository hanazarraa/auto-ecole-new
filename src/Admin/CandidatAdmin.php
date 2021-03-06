<?php
namespace App\Admin;
use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;




final class CandidatAdmin extends AbstractAdmin
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
            ->add('date_naissance', DateType::class, [
                    'widget' => 'single_text',
                    // this is actually the default format for single_text
                    'format' => 'yyyy-MM-dd',]
            )
            ->add('cin', TextType::class)
            ->add('adresse', TextType::class)
            ->add('codePostal', TextType::class)
            ->add('ville', TextType::class)
            ->add('telephone', TextType::class)
            ->add('Category',EntityType::class,[
                'class' =>Category::class,
                'choice_label'=>'name',
            ])

            ->add('ImageFile', FileType::class, ['required' => true])
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
            ->addIdentifier('cin')
            ->addIdentifier('adresse')
            ->addIdentifier('codePostal')
            ->addIdentifier('ville')
            ->addIdentifier('telephone')
            ->addIdentifier('dateNaissance')
            ->addIdentifier('category.name')
            ->addIdentifier('Category')
            ->add('ImageName')
            ->add('ImageFile')
            ;

    }
   

}
