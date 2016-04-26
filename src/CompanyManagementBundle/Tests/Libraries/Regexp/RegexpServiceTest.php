<?php

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 19.04.16
 * Time: 22:00
 */
class RegexpServiceTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase {

    private $container;

    public function setUp() {

        self::bootKernel();

        $this->container = self::$kernel->getContainer();
    }

    /**
     * @expectedException Exception
     */
    public function testMatchAllNullFirstParam() {

        $regexpService = $this->container->get('regexp');

        $result = $regexpService->matchAll();
    }

    /**
     * @expectedException Exception
     */
    public function testMatchAllNotArrayFirstParam() {

        $regexpService = $this->container->get('regexp');

        $result = $regexpService->matchAll('?');
    }

    /**
     * @expectedException Exception
     */
    public function testMatchAllEmptyArrayFirstParam() {

        $regexpService = $this->container->get('regexp');

        $result = $regexpService->matchAll(array());
    }

    /**
     * @expectedException Exception
     */
    public function testMatchAllWrongSecondParam() {

        $regexpService = $this->container->get('regexp');

        $result = $regexpService->matchAll(array('hello', 'okay'), $regexpService);
    }

    public function testMatchAll() {

        $regexpService = $this->container->get('regexp');

        $this->assertFalse(
            $regexpService->matchAll(array('hello', 'okay'), null)
        );

        $this->assertFalse(
            $regexpService->matchAll(array(''), null)
        );

        $this->assertTrue(
            $regexpService->matchAll(array('integer', 'string', 'weee'), 'string weee nope integer.')
        );

        $this->assertTrue(
            $regexpService->matchAll(array('integer', 'word'), "\rinteger.,word\n")
        );

        $this->assertFalse(
            $regexpService->matchAll(array('expr', 'expr1', 'expr2'), 'expr expr1 suafgfyaug')
        );

        $this->assertFalse(
            $regexpService->matchAll(array('expr', 'expr1', 'expr2'), "exprexpr1\nexpr2")
        );

        $this->assertFalse(
            $regexpService->matchAll(array('expr', 'expr1', 'expr2'), "expr.expr1expr2 expr1\r\nexpr2expr")
        );
    }

}
