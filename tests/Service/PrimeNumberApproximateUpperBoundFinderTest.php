<?php

namespace App\Tests\UnitTests\Service;

use App\Service\PrimeNumberApproximateUpperBoundFinder;
use PHPUnit\Framework\TestCase;

class PrimeNumberApproximateUpperBoundFinderTest extends TestCase
{
    private PrimeNumberApproximateUpperBoundFinder $primeNumberApproximateUpperBoundFinder;
    protected function setUp(): void
    {
        $this->primeNumberApproximateUpperBoundFinder = new PrimeNumberApproximateUpperBoundFinder();
        parent::setUp();
    }

    public function testFind()
    {
        $this->assertTrue($this->primeNumberApproximateUpperBoundFinder->findUpperBound(1000) > 7919);
        $this->assertTrue($this->primeNumberApproximateUpperBoundFinder->findUpperBound(1000000) > 15485863);
    }
}
