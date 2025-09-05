<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PropertyRepository $propertyRepository): Response
    {
        $items = $propertyRepository->findBy([], ['id' => 'DESC'], 3);
        // dd($items);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'items' => $items
        ]);
    }
}
