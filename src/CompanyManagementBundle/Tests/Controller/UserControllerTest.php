<?php

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 11.04.16
 * Time: 18:49
 */
class UserControllerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase {

    public function testLoginAction() {

        $client = static::createClient();

        $crawler = $client->request('GET',
            $client->getContainer()->get('router')->generate('login', array(), \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL)
        );

        $regexpGen = $client->getContainer()->get('regexp_generator');

        $expression = $regexpGen->matchingAll(
            array('login', 'username', 'password')
        );

        $text = $crawler->text();

        $this->assertGreaterThan(0, preg_match(
                $expression,
                $text)
        );
    }
}
