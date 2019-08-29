<?php

namespace App\Form;

use App\Entity\SeanceConduite;
use App\Entity\SeancesVehicules;
use App\Entity\Vehicule;
use App\Repository\SeanceConduiteRepository;
use App\Repository\VehiculeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class SeanceConduiteType extends AbstractType
{
    private $vehiculeRepository;
    private $seanceConduiteRepository;
    public function __construct(VehiculeRepository  $vehiculeRepository,SeanceConduiteRepository $SeanceConduiteRepository)
    {  
        $this->vehiculeRepository = $vehiculeRepository;
        $this->SeanceConduiteRepository=$SeanceConduiteRepository;

    }
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('debut')
            ->add('fin')
            /*->add('vehicule',EntityType::class,[
                'class' => Vehicule::class,
                'choice_label' => 'marque'
            ])*/
         
           
            ;
            $formModifier = function (FormInterface $form, $seance ) {
                 /*dump($seance['debut']);
                 exit;*/
                 $choices[]=[];
                
                /* $date=$seance->getDate();
                 
                $debut=$seance->getDebut();
                 $fin=$seance->getFin();*/
                 $date=$seance['date'];
                 $debut=$seance['debut'];
                 $fin=$seance['fin'];
                /*  var_dump($seance);
                  exit;*/
                 $vehicules=$this->vehiculeRepository->findAll();
                /* dump($vehicules->getSeanceConduite());
                 exit;*/
                 if($vehicules !=null){
                 foreach($vehicules as $vehicule){
                    $seancesconduite=$this->SeanceConduiteRepository->findByVehicule($vehicule);
                  /* dump($seancesconduite);
                    exit;*/
                     foreach($seancesconduite as $seanceC){

                         
                         if(($seanceC->getDate()==$date && $seanceC->getFin()<=$debut)|| $seanceC->getDate()!=$date){
                           
                             $choices[]=$vehicule;
                            
                         }
                        
            }
           /* dump($choices);
            exit;*/
                     
    }
}
                // dump($choices);

                 /*dump($vehicules);
                 exit;*/

                 $form->add('vehicule',EntityType::class,[
                     'class'         =>  Vehicule::class,
                     'choice_label' =>'Marque',
                     'choices' => $choices
                    
                 ]);
                 //$vehicules = $this->doctrine->getRepository(Vehicule::class)->findAll();
                 // dump($vehicules);
                  //exit;

               // $champsOptionnelsLotList = $lot->getProgramme()->getChampsOptionnelsLot()->getValues();
                 
              /*  foreach($champsOptionnelsLotList as $key => $champsOptionnelsLot)
                {
                    $form->add($champsOptionnelsLot->getNomChampsLot(),TextType::class, array(
                        'label' => $champsOptionnelsLot->getKeyTranslation()
                    ));
                }*/

            };
           /* $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) use ($formModifier) {
                        $data = $event->getData();
                        
                        $form=$event->getForm();
                        $formModifier($form, $data);
               
                }
            );*/
            $builder->addEventListener(
                FormEvents::PRE_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                        $data = $event->getData();
                        
                        $form=$event->getForm();
                        $formModifier($form, $data);
               
                }
            );
          
            
           /* $builder->get('date')->addEventListener(
                FormEvents::POST_SUBMIT,
                function(FormEvent $event) {
                    $form = $event->getForm();
                    dump($form->getChildren());
                   // dump($form->getDebut());
                    exit;
                    $form->getParent()->add('vehicule',EntityType::class,[
                        'class'=>Vehicule::class,
                        'placeholder' =>'Please select a vehicule',
                        'choices' =>$form->getData()->getVehicules()
                    ]); 
                }
            );*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SeanceConduite::class,
        ]);
    }
    public function onPostSetData(FormEvent $event)
    {
        $seance = $event->getData();
        $form = $event->getForm();
        if(isset($seance)){
            $form->add('vehicule',EntityType::class,[
                'class'=>Vehicule::class,
                'choice_label' => 'marque'
            ]);
            /*var_dump($seance->getDate());
            exit;*/
        }
      
            
        

        // checks whether the user has chosen to display their email or not.
        // If the data was submitted previously, the additional value that
        // is included in the request variables needs to be removed.
       /* if (isset($user['showEmail']) && $user['showEmail']) {
            $form->add('email', EmailType::class);
        } else {
            unset($user['email']);
            $event->setData($user);
        }*/
    }
    private function setupSpecificVehiculeType(FormInterface $form, ?string $location)
    {
        $choices = $this->getLocationNameChoices($location);
        
        $form->add('specificLocationName', ChoiceType::class, [
            'placeholder' => 'Where exactly?',
            'choices' => $choices,
            'required' => false,
        ]);
    }
}
