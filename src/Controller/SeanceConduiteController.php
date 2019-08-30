<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SeanceConduite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
class SeanceConduiteController extends AbstractController
{
    public function addAction(Request $request)
    {
    	// New object
    	$seanceconduite = new SeanceConduite();
    
    	// Build the form
    	$form = $this->create(SeanceConduiteType::class, $seanceconduite);
    
    	if ($request->isMethod('POST'))
    	{
    		$form->handleRequest($request);
    		// Check form data is valid
    		if ($form->isValid())
    		{
    			// Save data to database
    			$this->entityManager->persist($seanceconduite);
    			$this->entityManager->flush();
    
    			// Redirect to view page
    			return $this- new RedirectResponse($this->admin->generateUrl('view'));

    			
    		}
    	}
    	// If we are here it means that either
    	//	- request is GET (user has just landed on the page and has not filled the form)
    	//	- request is POST (form has invalid data)
    	return $this->render(
    		'seances/add.html.twig',
    		array (
    			'form'	=>	$form->createView(),
    		)
    	);
    }
    
    public function editAction(Request $request, SeanceConduite $seanceconduite)
    {
        // Build the form
        $form = $this->create(SeanceConduiteType::class, $seanceconduite);
        
        // All the rest is identical to the addAction method
        
        return $this->render(
			'seances/edit.html.twig',
			array (
				'form'		=>	$form->createView(),
				'seancecnduite'	=>	$seanceconduite
			)
		);
    }
}
