<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use AppBundle\Entity\Team;
use AppBundle\Entity\Trainer;
use AppBundle\Form\PlayerType;
use AppBundle\Form\TrainerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\TeamType;

class AddController extends Controller
{
    /**
     * @Route("/team/add", name="Add Team")
     * @param Request $request
     * @return Response
     */
    public function AddTeamAction(Request $request)
    {
        $team = new Team();

        $form = $this->createForm(TeamType::class, $team);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($team);
                $em->flush();
//                $this->addFlash('notice', 'Country ' . $team->getCountry() . ' added');
                return $this->redirectToRoute('homepage');
            }
        }

        $buttonName = 'Add Team';

        return $this->render('form/addForm.html.twig', ['form' => $form->createView(), 'name' => $buttonName]);
    }

    /**
     * @Route("/player/add", name="Add Player")
     * @param Request $request
     * @return Response
     */
    public function AddPlayerAction(Request $request)
    {
        $player = new Player();

        $form = $this->createForm(PlayerType::class, $player);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($player);
                $em->flush();

                return $this->redirectToRoute('homepage');
            }
        }

        $buttonName = 'Add Player';

        return $this->render('form/addForm.html.twig', ['form' => $form->createView(), 'name' => $buttonName ]);
    }

    /**
     * @Route("/trainer/add", name="Add Trainer")
     * @param Request $request
     * @return Response
     */
    public function AddTrainerAction(Request $request)
    {
        $trainer = new Trainer();

        $form = $this->createForm(TrainerType::class, $trainer);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($trainer);
                $em->flush();

                return $this->redirectToRoute('homepage');
            }
        }

        $buttonName = 'Add Trainer';

        return $this->render('form/addForm.html.twig', ['form' => $form->createView(), 'name' => $buttonName]);
    }

}