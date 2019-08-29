<?php
namespace App\Admin;

use App\Application\Sonata\UserBundle\Validator\Constraints\PcNonDisponible;
use App\Application\Sonata\UserBundle\Validator\Constraints\Tempsdebutinvalide;
use App\Application\Sonata\UserBundle\Validator\Constraints\Tempsfininvalide;

use App\Application\Sonata\UserBundle\Validator\Constraints\PcNonDisponibleValidator;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Entity\Pc;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\SeanceCode;
use App\Entity\Candidat;
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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\Time;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Repository\PcRepository;
use  Doctrine\Common\Persistence\ObjectManager;
use Sonata\Form\Validator\ErrorElement ;
use Doctrine\ORM\EntityManagerInterface;


final class SeanceConduiteAdmin extends AbstractAdmin{
 /**
     * @var PcRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $yourManager;
   /* public function __construct($code, $class, $baseControllerName, ObjectManager $yourManager)
    {
        parent::_construct($code, $class, $baseControllerName);
        $this->yourManager = $yourManager;
    }*/
    public function validate(ErrorElement $errorElement, $object)
    {
        $datenow = date("Y-m-d");  
       
        $date=$this->getSubject()->getDate();
        $date=$date->format("Y-m-d");

      
        if ($date == $datenow){            
        $errorElement->with('debut')
                      ->addConstraint(new Tempsdebutinvalide()) 
                      // ->with('candidats')
                       //->addConstraint(new PcNonDisponible())
                    
                       ->end();
       
                      
       }
       $debut=$this->getSubject()->getDebut();        
      /* var_dump($debut);
       exit; */      
       $debut=$debut->format('H:i:s');                     
       $fin=$this->getSubject()->getFin();               
       $fin=$fin->format('H:i:s');  
       
       if( date('H:i:s',strtotime($fin.' - 1 hours'))<$debut){
            $errorElement->with('fin')
                         ->addConstraint(new Tempsfininvalide())
                         ->end();
       }            
      
        
                         
                    
                          

    }
  
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', ['class' => 'col-md-12'])
            ->add('date', DateType::class, [
                    'format' => 'MM-dd-yyyy',
                    'years' => range(date('Y'), date('Y')+100),
                    'months' => range(date('m'), 12),
                    'days' => range(date('d'), 31),]
                ) ->add('debut',  TimeType::class)
                  ->add('fin',  TimeType::class)
            ;
           
      
          

           
     


            
          
         
         
    }
 
    
  
  

    public function prePersist($seance)
    {
       $subject = $this->getSubject();
    
       $debut =$subject->getDebut();
       $fin= $subject->getFin();
              
       $Nb = $debut->diff($fin);
          
         
      $Nbjc=$Nb->format("%H:%I:%S");
      $seance->setNbjc($Nbjc);
     
      }
     
    


    public function preUpdate($seance)
    {
        $subject = $this->getSubject();
      
        $debut =$subject->getDebut();
       $fin= $subject->getFin();
               
     $Nb = $debut->diff($fin);
           
          
      $Nbjc=$Nb->format("%H:%I:%S");
      $seance->setNbjc($Nbjc);
    
    
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('date')
                         ->add('debut')
                         ->add('fin')
                     ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('date')
            ->addIdentifier('debut')
            ->addIdentifier('fin')
           // ->addIdentifier('type_formation')
            //->addIdentifier('moniteur')
            ->addIdentifier('Nbjc')
          ;
        ;
    }
}