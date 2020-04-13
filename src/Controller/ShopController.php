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
    public function index()
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
        // $cp = rtrim($request->get('form')); // Récupère résultat formulaire
        $cp = ($request->get('form')); // Récupère résultat formulaire
        $url = "https://api.insee.fr/entreprises/sirene/V3/siret?q=codePostalEtablissement:$cp";
        $data = $client->request('GET',$url,['auth_bearer' => 'a6452ce6-b2d3-3292-bd24-c5de16d6d937']);
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());

    }
}

// https://api.insee.fr/entreprises/sirene/V3/siret?q=codePostalEtablissement:{{ formData }}',
