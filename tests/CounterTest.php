<?php

  namespace ProgrammerZamanNow\Test;

  use PHPUnit\Framework\TestCase;
  use PHPUnit\Framework\Assert;

  class CounterTest extends TestCase
  {
    public function testCounter()
    {
      $counter = new Counter();
      $counter->increment();
      Assert::assertEquals(1, $counter->getCounter());
      $counter->increment();
      $this->assertEquals(2, $counter->getCounter());
      $counter->increment();
      self::assertEquals(3, $counter->getCounter());
    }

    /**
    * @test
    */
    public function increment()
    {
      $counter = new Counter();
      $counter->increment();
      $this->assertEquals(1, $counter->getCounter());
    }

    public function testFirst(): Counter
    {
      $counter = new Counter();
      $counter->increment();
      $this->assertEquals(1, $counter->getCounter());
      return $counter;
    }

    /**
    * @depends testFirst
    */
    public function testSecond(Counter $counter): void
    {
      $counter->increment();
      $this->assertEquals(2, $counter->getCounter());
    }
  }
