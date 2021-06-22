<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @Route("/")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/admin/candidat", name="candidat_index", methods={"GET"})
     */
    public function index(CandidatRepository $candidatRepository): Response
    {
        return $this->render('candidat/index.html.twig', [
            'candidats' => $candidatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/candidat/new", name="candidat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidat);
            $entityManager->flush();

            return $this->redirectToRoute('candidat_index');
        }

        return $this->render('candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/candidat/{id}", name="candidat_show", methods={"GET"})
     */
    public function show(Candidat $candidat): Response
    {
        return $this->render('candidat/show.html.twig', [
            'candidat' => $candidat,
        ]);
    }

    /**
     * @Route("/candidat/{id}/edit", name="candidat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidat $candidat, SluggerInterface $slugger): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);
        $cv = $form->get('cv')->getData();
        $profile_picture = $form->get('profile_picture')->getData();
        $passport = $form->get('passport')->getData();

        

        if ($form->isSubmitted() && $form->isValid()) {

            if ($cv !== null) {
                $candidat->setCv($this->upload($cv, 'cv', $slugger));
            }
            if ($profile_picture !== null) {
                $candidat->setProfilePicture($this->upload($profile_picture, 'profile_picture', $slugger));
            }
            if ($passport !== null) {
                $candidat->setPassport($this->upload($passport, 'passport', $slugger));
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidat_edit',[
            'id'=> $candidat->getId(),

            ]);
        }

        return $this->render('candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
            'user' => $user,
            'filledFieldCount'=> $candidat-> getProfilCompletionPercent(),
        ]);
    }

    /**
     * @Route("/candidat/{id}", name="candidat_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidat $candidat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidat_index');
    }
    public function upload($file, $target_directory ,$slugger){
        if ($file) {
                    $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

                    // Move the file to the directory where brochures are stored
                    try {
                        $file->move(
                            $this->getParameter($target_directory),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }

                    // updates the 'brochureFilename' property to store the PDF file name
                    // instead of its contents
                    return $newFilename;
                }

        }
}
