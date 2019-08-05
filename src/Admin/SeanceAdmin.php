<?php
namespace App\Admin;

use App\Entity\Moniteur;
use App\Entity\Seance;
use App\Entity\Vehicule;
use MongoDB\BSON\Timestamp;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Validator\Constraints\Timezone;

final class SeanceAdmin extends AbstractAdmin{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', ['class' => 'col-md-9'])
            ->add('date', DateType::class, [
                    'format' => 'MM-dd-yyyy',
                    'years' => range(date('Y'), date('Y')+100),
                    'months' => range(date('m'), 12),
                    'days' => range(date('d'), 31),]
            )
            ->add('debut',  TimeType::class)
            ->add('fin',  TimeType::class)
            ->add('type_formation', TextType::class)
            /*->add('moniteur',EntityType::class,[
                'class' =>Moniteur::class,
                'choice_label'=>'nom',])*/
            ->add('Nbjc',TextType::class)
            ->end();

    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('date');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('date')
            ->addIdentifier('debut')
            ->addIdentifier('fin')
            ->addIdentifier('type_formation')
            //->addIdentifier('moniteur')
            ->addIdentifier('Nbjc')
        ;

    }



}