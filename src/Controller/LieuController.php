<?php

namespace App\Controller;

use App\Entity\Location;
use App\Service\CallApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LieuController extends AbstractController
{

    /**
     * @Route("/lieu/{id}", name="lieu", requirements={"id"="\d+"})
     * @param CallApi $callApiServices
     * @param int $id
     * @return Response
     */
    public function index(CallApi $callApiServices, int $id): Response
    {
        $location = $this->getOneLocation($id);
        $latitude = $this->getOneLocationLatitude($id);
        $longitude = $this->getOneLocationLongitude($id);

        // TODO: Faire le JsonResponse et le renvoyer en fetch
        return $this->render('lieu/index.html.twig', [
            'data' => $callApiServices->getApiLocation($location),
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
    }

    public function getOneLocation($id): ?string
    {
        $location = $this->getDoctrine()
            ->getRepository('App:Location')
            ->find($id);

        if (!$location) {
            throw $this->createNotFoundException('Aucun lieu n\'a été trouvé :cry:');
        }

        return $location->getName();
    }


    public function getOneLocationLatitude($id): ?string
    {
        $location = $this->getDoctrine()
            ->getRepository('App:Location')
            ->find($id);

        if (!$location) {
            throw $this->createNotFoundException('Aucun lieu n\'a été trouvé :cry:');
        }

        return $location->getLatitude();
    }

    public function getOneLocationLongitude($id): ?string
    {
        $location = $this->getDoctrine()
            ->getRepository('App:Location')
            ->find($id);

        if (!$location) {
            throw $this->createNotFoundException('Aucun lieu n\'a été trouvé :cry:');
        }

        return $location->getLongitude();
    }


}
