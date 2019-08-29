<?php
namespace App\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
class CalendarAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'calendrier';
    protected $baseRouteName = 'calendrier';
    protected function configureRoutes(RouteCollection $collection)
    {

       $collection->add('calendrier');
    }
}