<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 09.04.16
 * Time: 13:51
 */

namespace CompanyManagement\DataFixtures\ORM;

use CompanyManagementBundle\Entity\Department;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CompanyManagementBundle\Entity\Role;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $role = new Role();
        $role->setDescription('description');
        $role->setTitle('title');
        $role->setName('name');
        //$role->setAcl()

        $manager->persist($role);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}