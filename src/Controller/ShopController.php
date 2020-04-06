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
        dd($request);
        $client = HttpClient::create();
        $data = $client->request('GET', 'https://api.insee.fr/entreprises/sirene/V3/siret?q=codePostalEtablissement:68100',['auth_bearer' => 'a6452ce6-b2d3-3292-bd24-c5de16d6d937']);
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());

    }
}
