<?php

  namespace ProgrammerZamanNow\Test;

  use PHPUnit\Framework\TestCase;

  class ProductServiceTest extends TestCase
  {
    private ProductRepository $respository;
    private ProductService $service;

    protected function setUp(): void
    {
      $this->repository = $this->createStub(ProductRepository::class);
      $this->service = new ProductService($this->repository);
    }

    public function testStub()
    {
      $product = new Product();
      $product->setId("1");
      $this->repository->method("findById")->willReturn($product);
      $result = $this->repository->findById("1");
      self::assertSame($product, $result);
    }
  }
