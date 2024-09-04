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
    }
  }
