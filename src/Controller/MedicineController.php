<?php

namespace App\Controller;

use App\Entity\Log;
use App\Entity\Medicine;
use App\Form\MedicineType;
use App\Repository\MedicineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medicine")
 */
class MedicineController extends AbstractController
{
    public function indexAction()
    {
        $logger = $this->get('logger');
        $logger->info('I just got the logger');
        $logger->err('An error occurred');

        // ...
    }

    /**
     * @Route("/", name="medicine_index", methods={"GET"})
     * @param MedicineRepository $medicineRepository
     * @return Response
     */
    public function index(MedicineRepository $medicineRepository): Response
    {
        return $this->render('medicine/index.html.twig', [
        'medicines' => $medicineRepository->findAll(),
        ]);
    }
    /**
     * @Route("/list", name="medicine_list", methods={"GET"})
     * @param MedicineRepository $medicineRepository
     * @return Response
     */
    public function showList(MedicineRepository $medicineRepository):Response
    {
        return $this->render('medicine/list.html.twing', [
            'medicines' => $medicineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="medicine_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $medicine = new Medicine();
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medicine);
            $entityManager->flush();

            echo 'if';
            return $this->redirectToRoute('medicine_index');
        }

        echo 'return';
        return $this->render('medicine/new.html.twig', [
            'medicine' => $medicine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medicine_show", methods={"GET"})
     * @param Medicine $medicine
     * @return Response
     */
    public function show(Medicine $medicine): Response
    {
        return $this->render('medicine/show.html.twig', [
            'medicine' => $medicine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medicine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medicine $medicine): Response
    {
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medicine_index');
        }

        return $this->render('medicine/edit.html.twig', [
            'medicine' => $medicine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medicine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medicine $medicine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medicine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medicine_index');
    }
}
