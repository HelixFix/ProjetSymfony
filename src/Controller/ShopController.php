<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends AbstractController
{
    /**
     * @Route("/magasins", name="shop")
     */
    public function index(Request $request)
    {
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
        ]);

    }
    
     /**
     * @Route("/test", name="test")
     */
    public function test(Request $request)
    {
        // dd($request->get('form')); // commenter pour afficher le json
        $client = HttpClient::create();
        // $cp = rtrim($request->get('form')); 
        $cp = ($request->get('form')); // Récupère résultat formulaire
        $url = "https://api.insee.fr/entreprises/sirene/V3/siret?q=codePostalEtablissement:$cp AND activitePrincipaleUniteLegale:47.11D";
        $data = $client->request('GET',$url,['auth_bearer' => '2bfe24f2-62bf-32b0-bce1-154e74554065']);
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());

    }
}
