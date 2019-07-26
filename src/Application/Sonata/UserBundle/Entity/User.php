<?php

namespace App\Application\Sonata\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

//use FOS\UserBundle\Model\User as BaseUser;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Sonata\UserBundle\Model\UserInterface;
/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 */
class User extends BaseUser
{
   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     
    public function getId()
    {
        return $this->id;
    }
    public static function getGenderList()
{
    return array(
        UserInterface::GENDER_UNKNOWN => 'gender_unknown',
        UserInterface::GENDER_FEMALE  => 'gender_female',
        UserInterface::GENDER_MALE    => 'gender_male',
    );
}
 /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     *
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstName( $firstname) {
        $this->firstname= $firstname;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
   
    
}
