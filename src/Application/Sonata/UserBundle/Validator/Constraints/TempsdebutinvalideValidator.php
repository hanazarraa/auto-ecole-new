<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Parametres;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
class TempsdebutinvalideValidator extends ConstraintValidator{
    private $em;
  
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function validate($value, Constraint $constraint){
        $timenow = date("H:i:s");
       /* var_dump($timenow);
        var_dump(($value)->format('H:i:s'));
      
        var_dump(date('H:i:s',strtotime($value.' - 1 hours')));
        exit;*/
       
       // var_dump($value);
       $value=$value->format('H:i:s');
       $value=date('H:i:s',strtotime($value.' - 1 hours'));
        if ($value<$timenow){
            $this->context->buildViolation($constraint->message)
            //    ->setParameter('{{ object }}', $value)
                ->addViolation();
        }

      
    }

}