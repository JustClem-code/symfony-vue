<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
  #[Route('/')]
  public function index(): Response
  {
    $number = random_int(0, 100);

    return $this->render('pages/home.html.twig', [
      'number' => $number,
    ]);
  }

  #[Route("/array")]
  public function getArrayTest()
  {
    $list = [
      array("titre" => "M.", "age" => 30, "ville" => "Paris"),
      array("titre" => "Ma", "age" => 45, "ville" => "Nantes"),
      array("titre" => "Mi", "age" => 77, "ville" => "Lyon"),
    ];

    return $this->json($list, 200);
  }
}
