<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 05.04.16
 * Time: 11:29
 */
class UserTest extends WebTestCase {

    /**
     * @var EntityManager
     */
    private $_em;

    private $department;

    protected function setUp() {

        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->department = new \CompanyManagementBundle\Entity\Department();
        $this->department->setDescription('');
    }

    public function testCreateUser() {

        $user = new \CompanyManagementBundle\Entity\User();

        $user->setAddress("llelelelel");
        $user->setCity('sasdihasuf');
        $user->setCompany('dsadfsfd');
        $user->setDateAdded(new \Symfony\Component\Validator\Constraints\DateTime());
        $user->setDepartment();

        $this->_em->persist($user);
        $this->_em->flush();
    }
}
