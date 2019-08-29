<?php

    // ...
  

namespace App\EventListener;

use App\Entity\SeanceConduite;
use App\Repository\SeanceConduiteRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;

class CalendarListener
{
    private $seanceconduiteRepository;
    private $router;

    public function __construct(
        SeanceConduiteRepository $seanceconduiteRepository,
        UrlGeneratorInterface $router
    ) {
        $this->seanceconduiteRepository = $seanceconduiteRepository;
        $this->router = $router; 
    }
    
    public function loadEvents(CalendarEvent $calendar): void
    {
       
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Modify the query to fit to your entity and needs
        // Change b.beginAt by your start date in your custom entity
        $seances = $this->seanceRepository
            ->createQueryBuilder('seance_conduite')
            ->where('seance_conduite.debut BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
            ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;
       

        foreach ($seances as $seance) {
            // this create the events with your own entity (here booking entity) to populate calendar
            $seanceEvent = new Event(
               
                $seance->getDebut(),
                $seance->getFin() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Optional calendar event settings
             *
             * For more information see : Toiba\FullCalendarBundle\Entity\Event
             * and : https://fullcalendar.io/docs/event-object
             */
            // $bookingEvent->setUrl('http://www.google.com');
             //$seanceEvent->setBackgroundColor('yellow');
            // $bookingEvent->setCustomField('borderColor', $booking->getColor());

            $seanceEvent->setUrl(
                $this->router->generate('seance_show', [
                    'id' => $seance->getId(),
                ])
            );

            // finally, add the booking to the CalendarEvent for displaying on the calendar
            $calendar->addEvent($seanceEvent);
        }
        echo json_encode($seances);
    }


}