<?php
namespace App\Controller;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CalendrierController extends CRUDController
{
    private $twig;

 
  
    public function listAction()
    {

        $user="hana";
        dump($user);
        exit;
      
       
    }
}