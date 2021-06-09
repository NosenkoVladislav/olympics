<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Country;
use App\Form\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/country", name="admin_")
 */
class CountryController extends AbstractController
{
    /**
     * @Route("/", name="country_index", methods={"GET"})
     */
    public function index(): Response
    {
        $countries = $this->getDoctrine()
            ->getRepository(Country::class)
            ->findBy([], ['goldMedalAmount' => 'DESC']);

        return $this->render('admin/country/index.html.twig', [
            'countries' => $countries,
        ]);
    }

    /**
     * @Route("/new", name="country_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($country);
            $entityManager->flush();

            return $this->redirectToRoute('admin_country_index');
        }

        return $this->render('admin/country/new.html.twig', [
            'country' => $country,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="country_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Country $country): Response
    {
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_country_index');
        }

        return $this->render('admin/country/edit.html.twig', [
            'country' => $country,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="country_delete")
     */
    public function delete(Country $country): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($country);
        $entityManager->flush();

        return $this->redirectToRoute('admin_country_index');
    }
}
