<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\SearchCarType;
use App\ClassSearch\CarSearch;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CarsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/voitures', name: 'app_cars')]
    public function index(Request $request,  PaginatorInterface $paginator): Response
    {
        //Search form
        $search = new CarSearch();
        $searchForm = $this->createForm(SearchCarType::class, $search);
        $searchForm->handleRequest($request);

        //$cars = $this->entityManager->getRepository(Car::class)->findAll();
        $cars  = $this->entityManager->getRepository(Car::class)->findCars($search);

        //Pagination
        $paginations = $paginator->paginate(
            $cars, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('cars/index.html.twig', [
            'paginations' => $paginations,
            'form' => $searchForm->createView()
        ]);
    }
}
