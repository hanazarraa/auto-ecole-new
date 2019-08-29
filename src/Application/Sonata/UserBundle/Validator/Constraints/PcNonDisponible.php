<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
/**
* @Annotation
*/ 
class PcNonDisponible extends Constraint{

    public $message = "No Pcs availables";
    public function validatedBy(){
        return \get_class($this).'Validator';
     }

}