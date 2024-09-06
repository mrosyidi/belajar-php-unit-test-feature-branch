<?php

  namespace ProgrammerZamanNow\Test;

  use PHPUnit\Framework\TestCase;

  class CounterStaticTest extends TestCase
  {
    public static Counter $counter;

    public static function setUpBeforeClass(): void
    {
      self::$counter = new Counter();
    }

    public function testFirst()
    {
      self::$counter->increment();
      $this->assertEquals(1, self::$counter->getCounter());
    }

    public function testSecond(): void
    {
      self::$counter->increment();
      $this->assertEquals(2, self::$counter->getCounter());
    }

    public static function tearDownAfterClass(): void
    {
      echo "Unit Test Selesai" . PHP_EOL;
    }
  }
