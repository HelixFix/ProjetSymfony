<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

<<<<<<< HEAD



=======
>>>>>>> 32ef7db6b386d7642653d23df927f82faaa895f3
class DonationController extends AbstractController
{
    /**
     * @Route("/don", name="donation")
     */
    public function index()
    {
<<<<<<< HEAD
        return $this->render('pages/donation.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }


=======
        return $this->render('donation/index.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }
>>>>>>> 32ef7db6b386d7642653d23df927f82faaa895f3
}
