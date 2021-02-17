<?php

namespace App\Controller;

use App\Entity\CurrentSubstance;
use App\Form\CurrentSubstanceType;
use App\Repository\CurrentSubstanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/current_substance")
 */
class CurrentSubstanceController extends AbstractController
{
    /**
     * @Route("/", name="current_substance_index", methods={"GET"})
     * @param CurrentSubstanceRepository $currentSubstanceRepository
     * @return Response
     */
    public function index(CurrentSubstanceRepository $currentSubstanceRepository): Response
    {
        return $this->render('current_substance/index.html.twig', [
            'current_substances' => $currentSubstanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="current_substance_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $currentSubstance = new CurrentSubstance();
        $form = $this->createForm(CurrentSubstanceType::class, $currentSubstance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currentSubstance);
            $entityManager->flush();

            return $this->redirectToRoute('current_substance_index');
        }

        return $this->render('current_substance/new.html.twig', [
            'current_substance' => $currentSubstance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="current_substance_show", methods={"GET"})
     * @param CurrentSubstance $currentSubstance
     * @return Response
     */
    public function show(CurrentSubstance $currentSubstance): Response
    {
        return $this->render('current_substance/show.html.twig', [
            'current_substance' => $currentSubstance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="current_substance_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CurrentSubstance $currentSubstance
     * @return Response
     */
    public function edit(Request $request, CurrentSubstance $currentSubstance): Response
    {
        $form = $this->createForm(CurrentSubstanceType::class, $currentSubstance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('current_substance_index');
        }

        return $this->render('current_substance/edit.html.twig', [
            'current_substance' => $currentSubstance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="current_substance_delete", methods={"DELETE"})
     * @param Request $request
     * @param CurrentSubstance $currentSubstance
     * @return Response
     */
    public function delete(Request $request, CurrentSubstance $currentSubstance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$currentSubstance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($currentSubstance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('current_substance_index');
    }
}
