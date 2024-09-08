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

    public function testIncrement()
    {
      self::assertEquals(0, $this->counter->getCounter());
      self::markTestIncomplete("TODO do increment");
      echo "TEST TEST" . PHP_EOL;
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

    protected function tearDown(): void
    {
      echo "Tear Down" . PHP_EOL;
    }

    /**
    * @after
    */
    protected function after(): void
    {
      echo "After" . PHP_EOL;
    }

    /**
    * @requires OSFAIMILY Windows
    */
    public function testOnlyWindows()
    {
      self::assertTrue(true, "Only in Windows");
    }

    /**
    * @requires PHP >= 8
    * @requires OSFAIMILY Darwin
    */
    public function testOnlyForMacAndPHP()
    {
      self::assertTrue(true, "Only for Mac and PHP 8");
    }
  }
