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

    public function testStubMap()
    {
      $product1 = new Product();
      $product1->setId("1");
      $product2 = new Product();
      $product2->setId("2");
      $map = [
        ["1", $product1],
        ["2", $product2]
      ];
      $this->repository->method("findById")->willReturnMap($map);
      self::assertSame($product1, $this->repository->findById("1"));
      self::assertSame($product2, $this->repository->findById("2"));
    }

    public function testStubCallback()
    {
      $this->repository->method("findById")->willReturnCallBack(function (string $id){
        $product = new Product();
        $product->setId($id);
        return $product;
      });
      self::assertSame("1", $this->repository->findById("1")->getId());
      self::assertSame("2", $this->repository->findById("2")->getId());
    }
  }
