<?php

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 12.04.16
 * Time: 11:45
 */
class RegexpGeneratorServiceTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase {

    private $container;

    public function setUp() {

        self::bootKernel();

        $this->container = self::$kernel->getContainer();
    }

    public function testMatchingAll() {

        $regexpService = $this->container->get('regexp_generator');

        $expression = $regexpService->matchingAll(array('wyraz1, wyraz2'));

        $this->assertGreaterThan(0, preg_match(
                $expression,
                'wyraz1
                adjdsai
                slkdajdsaoij wyraz2')
        );
    }
}
