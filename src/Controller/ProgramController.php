<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Season;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;

/**
 * Class ProgramController
 * @package App\Controller
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]
        );
    }

    /**
     * @Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['id' => $id]);

        $seasons = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findBy(
                ['program' => $program->getId()],
                ['id' => 'ASC']
            );

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
            'seasons'=> $seasons,
        ]);
    }

    /**
     * @Route("/{programId}/seasons/{seasonId}", name="season_show")
     * @param int $programId
     * @param int $seasonId
     */
    public function showSeason(int $programId, int $seasonId)
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->find($programId);

        $season = $this->getDoctrine()
            ->getRepository(Season::class)
            ->find($seasonId);

        $episodes = $this->getDoctrine()
            ->getRepository(Episode::class)
            ->findBy(
                ['season' => $season->getId()],
                ['id' => 'ASC']
            );

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season'=> $season,
            'episodes' => $episodes,
        ]);
    }
}