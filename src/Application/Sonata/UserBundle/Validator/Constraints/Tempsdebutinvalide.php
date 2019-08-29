<?php
namespace App\Application\Sonata\UserBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
/**
* @Annotation
*/ 
class Tempsdebutinvalide extends Constraint{

    public $message = "You are so late to create new seance";
    public function validatedBy(){
        return \get_class($this).'Validator';
     }

}