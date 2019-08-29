<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
/**
* @Annotation
*/ 
class Tempsfininvalide extends Constraint{

    public $message = "The seance code should be longer than one our";
    public function validatedBy(){
        return \get_class($this).'Validator';
     }

}