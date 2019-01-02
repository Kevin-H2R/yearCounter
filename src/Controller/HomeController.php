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

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $counter = new Counter();
        $form = $this->createForm(CounterType::class, $counter);

        return $this->render('home.html.twig', [
           'form' => $form->createView(),
        ]);
    }
}