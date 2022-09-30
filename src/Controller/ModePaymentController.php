<?php

namespace App\Controller;

use App\Entity\ModePayment;
use App\Form\ModePaymentType;
use App\Repository\ModePaymentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mode/payment")
 */
class ModePaymentController extends AbstractController
{
    /**
     * @Route("/", name="mode_payment_index", methods={"GET","POST"})
     */
    public function index(ModePaymentRepository $modePaymentRepository,Request $request): Response
    {
        $modePayment = new ModePayment();
        $form = $this->createForm(ModePaymentType::class, $modePayment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modePayment);
            $entityManager->flush();

            return $this->redirectToRoute('mode_payment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mode_payment/index.html.twig', [
            'mode_payments' => $modePaymentRepository->findAll(),
            'mode_payment' => $modePayment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/new", name="mode_payment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $modePayment = new ModePayment();
        $form = $this->createForm(ModePaymentType::class, $modePayment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modePayment);
            $entityManager->flush();

            return $this->redirectToRoute('mode_payment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mode_payment/new.html.twig', [
            'mode_payment' => $modePayment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="mode_payment_show", methods={"GET"})
     */
    public function show(ModePayment $modePayment): Response
    {
        return $this->render('mode_payment/show.html.twig', [
            'mode_payment' => $modePayment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mode_payment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ModePayment $modePayment): Response
    {
        $form = $this->createForm(ModePaymentType::class, $modePayment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mode_payment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mode_payment/edit.html.twig', [
            'mode_payment' => $modePayment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="mode_payment_delete", methods={"POST"})
     */
    public function delete(Request $request, ModePayment $modePayment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modePayment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modePayment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mode_payment_index', [], Response::HTTP_SEE_OTHER);
    }
}
