<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MexQ\Home\Domain\HomeRepository;
use MexQ\Home\Application\DBTester;

class DefaultController extends Controller
{
  private $repository;
  private $tester;

  public function __construct()
  {
    $this->repository = new HomeRepository;
    $this->tester = new DBTester($this->repository);
  }

  /** 
   * @Route("/", name="homepage") 
   * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api).+"}) 
   * @Method("GET") 
   */
  public function indexAction(Request $request)
  {
    return $this->render('default/index.html.twig', [
      'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
      'controller_name' => 'DefaultController',
    ]);
  }

  /**
   * @Route("/api/colors", name="colors_route")
   */
  public function colorsAction()
  {
    return  new JsonResponse(array('colors' => ['red', 'green', 'blue', 'yellow'], "success" => true));
  }

  /**
   * @Route("/api/_test_db", name="test_db_route")
   */
  public function testDB()
  {
    return $this->json($this->tester->__invoke());
  }
}
