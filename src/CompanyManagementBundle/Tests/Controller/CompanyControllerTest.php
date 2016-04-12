<?php

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 11.04.16
 * Time: 18:01
 */
class CompanyControllerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase {

    public function testIndexAction() {

        $client = static::createClient();

        $crawler = $client->request('GET',
            $client->getContainer()->get('router')->generate('company_index', array(), \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL)
        );

        $text = $crawler->text();

        $regexpService = $client->getContainer()->get('regexp');

        $this->assertTrue($regexpService->matchAll(
            array('name', 'email', 'city', 'zipcode', 'telephone', 'fax', 'nip', 'email', 'description'),
            $text
        ));
    }
}
