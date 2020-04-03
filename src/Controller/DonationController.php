<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class DonationController extends AbstractController
{
    /**
     * @Route("/don", name="donation")
     */
    public function index()
    {
        return $this->render('pages/donation.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }

}
