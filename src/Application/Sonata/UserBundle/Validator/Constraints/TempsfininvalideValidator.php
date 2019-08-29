<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Parametres;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
class TempsfininvalideValidator extends ConstraintValidator{
    private $em;
  
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function validate($value, Constraint $constraint){
     
      
            $this->context->buildViolation($constraint->message)
            //    ->setParameter('{{ object }}', $value)
                ->addViolation();
        

      
    }

}