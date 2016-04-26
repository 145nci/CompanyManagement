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

    /**
     * @expectedException Exception
     */
    public function testMatchingAllNullParam() {

        $regexpService = $this->container->get('regexp_generator');

        $expression = $regexpService->matchingAll();
    }

    /**
     * @expectedException Exception
     */
    public function testMatchingAllNotArrayParam() {

        $regexpService = $this->container->get('regexp_generator');

        $expression = $regexpService->matchingAll('?');
    }

    /**
     * @expectedException Exception
     */
    public function testMatchingAllEmptyArrayParam() {

        $regexpService = $this->container->get('regexp_generator');

        $expression = $regexpService->matchingAll(array());
    }

    public function testMatchingAll() {

        $regexpService = $this->container->get('regexp_generator');

        $expression = $regexpService->matchingAll(array('integer', 'string', 'weee'));

        $this->assertGreaterThan(0, preg_match(
                $expression,
                'string weee nope integer.')
        );

        $expression = $regexpService->matchingAll(array('integer', "word"));

        $this->assertGreaterThan(0, preg_match(
                $expression,
                "\rinteger.,word\n")
        );

        $expression = $regexpService->matchingAll(array('expr', 'expr1', 'expr2'));

        $this->assertEquals(0, preg_match(
                $expression,
                'expr expr1 suafgfyaug')
        );

        $this->assertEquals(0, preg_match(
                $expression,
                "exprexpr1\nexpr2")
        );

        $this->assertEquals(0, preg_match(
                $expression,
                "expr.expr1expr2 expr1\r\nexpr2expr")
        );
    }

}
