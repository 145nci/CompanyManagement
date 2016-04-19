<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 09.04.16
 * Time: 14:14
 */

namespace CompanyManagement\DataFixtures\ORM;

use CompanyManagementBundle\Entity\WorkTimeLog;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWorkTimeLogData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $workTime = new WorkTimeLog();
        $workTime->setDateStart(new \DateTime());
        $workTime->setDateEnd(new \DateTime());
        $workTime->setUser($this->getReference('user_1'));


        $manager->persist($workTime);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}