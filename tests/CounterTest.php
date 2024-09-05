<?php

  namespace ProgrammerZamanNow\Test;

  use PHPUnit\Framework\TestCase;
  use PHPUnit\Framework\Assert;

  class CounterTest extends TestCase
  {
    private Counter $counter;

    protected function setUp(): void
    {
      $this->counter = new Counter();
      echo "Membuat Counter" . PHP_EOL;
    }

    public function testCounter()
    {
      $this->counter->increment();
      Assert::assertEquals(1, $this->counter->getCounter());
      $this->counter->increment();
      $this->assertEquals(2, $this->counter->getCounter());
      $this->counter->increment();
      self::assertEquals(3, $this->counter->getCounter());
    }

    /**
    * @test
    */
    public function increment()
    {
      $this->counter->increment();
      $this->assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
      $this->counter->increment();
      $this->assertEquals(1, $this->counter->getCounter());
      return $this->counter;
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
