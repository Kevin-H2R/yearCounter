<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 02/01/2019
 * Time: 16:55
 */

namespace App\Controller;


use App\Entity\Counter;
use App\Form\CounterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $counterRepository = $this->getDoctrine()->getRepository(Counter::class);
        $counters = $counterRepository->findAll();
        $counter = new Counter();
        $form = $this->createForm(CounterType::class, $counter);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $counter = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($counter);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('home.html.twig', [
           'form' => $form->createView(),
            'counters' => $counters,
        ]);
    }
}