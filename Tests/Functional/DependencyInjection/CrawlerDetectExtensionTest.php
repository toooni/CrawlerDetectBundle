<?php

namespace Nmure\CrawlerDetectBundle\Tests\Functional\DependencyInjection;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CrawlerDetectExtensionTest extends KernelTestCase
{
    protected function setUp() : void
    {
        self::bootKernel();
    }

    public function testServiceIsDefined()
    {
        self::assertInstanceOf('Jaybizzle\\CrawlerDetect\\CrawlerDetect', static::$kernel->getContainer()->get('crawler_detect'));
    }
}
