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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, SerializerInterface $serializer)
    {
        $counterRepository = $this->getDoctrine()->getRepository(Counter::class);
        $counters = $counterRepository->findAll();

        return $this->render('home.html.twig', [
            'counters' => $serializer->serialize($counters, 'json'),
        ]);
    }

    /**
     * @\Symfony\Component\Routing\Annotation\Route("/new-counter", name="post-counter")
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function postCounter(Request $request, SerializerInterface $serializer)
    {
        $data = json_decode($request->getContent(), true);
        $counter = new Counter();
        $form = $this->createForm(CounterType::class, $counter);
        $form->submit($data);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($counter);
        $manager->flush();

        return new JsonResponse($serializer->serialize($counter, 'json'));
    }
}