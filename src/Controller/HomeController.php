<?php

namespace App\Controller;

use App\Repository\JobCategoryRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user' => $this->getUser(),
        ]);
    }
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function job_index(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {
        // dd($jobCategoryRepository->findAll());
        $user = $this->getUser();

        $allJobCategory = $jobCategoryRepository->findAll();

        return $this->render('home/index.html.twig', [
            'job_offers' => $jobOfferRepository->findAll(),
            'user' => $user,
            'categories' => $allJobCategory,
        ]);
    }




    /**
     * @Route("/contact", name="contact_index")
     */
    public function contact_index():Response
    {
        return $this->render('home/contact.html.twig');
    }

        /**
     * @Route("/compagny", name="compagny_index")
     */
    public function compagny_index():Response
    {
        return $this->render('home/compagny.html.twig');
    }

    /**
     * @Route("/access-denied", name="app_access_denied")
     */
    public function accessDenied():Response
    {
        if ( $this->getUser() ) {
            $this->addFlash('success', "Vous n'êtes pas autorisé à accéder à la partie Administrateur");
            return $this->redirectToRoute('home');
        }

        else if ( $this->getUser() ) {
        $this->addFlash('success', "Vous n'êtes pas connecté");
        return $this->redirectToRoute('app_login');
        }

    }




}
