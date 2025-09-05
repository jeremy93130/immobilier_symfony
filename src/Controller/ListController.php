<?php

namespace App\Controller;

use App\Form\FilterType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(PropertyRepository $propertyRepository): Response
    {
        $items = $propertyRepository->findAll();

        $filter = $this->createForm(FilterType::class);

        if ($filter->isSubmitted() && $filter->isValid()) {
            dd('oui');
        }
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'items' => $items,
            'form' => $filter
        ]);
    }
}
