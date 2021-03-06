<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 09.04.16
 * Time: 13:59
 */

namespace CompanyManagement\DataFixtures\ORM;

use CompanyManagementBundle\Entity\Acl;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadAclData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $role = new Acl();
        $role->setRole($this->getReference('role_1'));
        $role->setCompanyIndex(true);

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
        return 6;
    }
}