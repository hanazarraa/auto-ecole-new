<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Parametres;
use App\Entity\Candidat;
use App\Entity\SeanceCode;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
class PcNonDisponibleValidator extends ConstraintValidator{
    private $em;
  
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function validate($value, Constraint $constraint){

       $pcs = $this->em->getRepository(Parametres::class)->getPcs();
       $debut=$value->getDebut();
      //$debut=$value->getOwner()->getDebut();
      $debut1=$debut->format('H:i:s');
       $candidats=$value->getCandidats();
       
     
      
        $seances=$this->em->getRepository(SeanceCode::class)->findAll();
        $nb=0;
        foreach($seances as $seance){
            if($seance->getFin()>$debut){
                $candidatsEnreg=$this->em->getRepository(Candidat::class)->findByseancecode($seance->getId());
                $nb+=count($candidatsEnreg);
                
            }
        }
       // dump("candidats enreg");
       // dump($nb);
      /*  $candidatsBd=$this->em->getRepository(Candidat::class)->findByseancecode($seance['id']);
        $candidatsbd+=count($candidatsBd);*/
      
      
       
       // $candidatsbd=$this->em->getRepository(Candidat::class)->findAll();
      /*  dump($candidatsbd);
        exit;*/

        $nb1=0;
       if(count($candidats)!=0){
            //$nbCandidats=$nb-$candidats;
            //chnchouf les candidats li mawjoudine f formulaaire
            //les cand li fbd 
            //est ce que cand li f formulaire (menhom msajline f base )w maahom jdod > pcs 
            //donc nb =cand(bd)+cand(form mch msajline)
           
          //  foreach($candidats as $candidat){
                $candidatsnew=$this->em->getRepository(Candidat::class)->findByseancecode(NULL);
             
                foreach($candidats as $candidat){
                    if (in_array($candidat, $candidatsnew)){
                        $nb1++;
                    }
                }
               /*dump($candidatsnew);
               exit;*/

               // }
            }
           
            
        
     //   dump('cand non enreg');
        //dump($nb1);
      //  exit;
      //  $nbCandidats=$nb;
      $nbCandidats=$nb+$nb1;

           
       
        if( ($pcs[0])['parametres_nombre_pcs'] < $nbCandidats){
           
            $this->context->buildViolation($constraint->message)
            //    ->setParameter('{{ object }}', $value)
                ->addViolation();
        }
    }

}