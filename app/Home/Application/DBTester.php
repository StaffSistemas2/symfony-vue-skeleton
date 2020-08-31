<?php

namespace MexQ\Home\Application;

use MexQ\Home\Domain\HomeRepository;

class DBTester
{
  private $repository;

  public function __construct(HomeRepository $repository)
  {
    $this->repository = $repository;
  }

  public function __invoke()
  {
    return $this->repository->test();
  }
}
