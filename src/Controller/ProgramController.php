<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProgramController
 * @package App\Controller
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->render( 'show.html.twig', [
            'id' => $id
        ] );
    }
}