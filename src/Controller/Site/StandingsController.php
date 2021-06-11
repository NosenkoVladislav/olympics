<?php

namespace App\Controller\Site;

use App\Entity\Admin\Country;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StandingsController extends AbstractController
{
    private const UKRAINE = 'Україна';
    private $ukraine = '';

    /**
     * @Route("/all", name="countries_all", methods={"GET"})
     */
    public function indexAll(): Response
    {
        return $this->render('site/standings.html.twig', [
            'countries' => $this->getDoctrine()
                ->getRepository(Country::class)
                ->findBy([], ['goldMedalAmount' => 'DESC']),
        ]);
    }

    /**
     * @Route("/top-five", name="country_top_five", methods={"GET"})
     */
    public function indexTopFive(): Response
    {
        $countries = $this->getDoctrine()
            ->getRepository(Country::class)
            ->findBy([], ['goldMedalAmount' => 'DESC']);

        $topFive = [];

        foreach ($countries as $country) {
            if ($country->getName() === self::UKRAINE) {
                $this->ukraine = $country;
                unset($country);
            } else {
                $topFive[] = $country;
            }
        }

        array_unshift($topFive, $this->ukraine);

        $topFive = array_slice($topFive, 0, 5, false);

        return $this->render('site/standings.html.twig', [
            'countries' => $topFive,
        ]);
    }
}