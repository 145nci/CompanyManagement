<?php

namespace CompanyManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acl
 *
 * @ORM\Table(name="acl")
 * @ORM\Entity(repositoryClass="CompanyManagementBundle\Repository\AclRepository")
 */
class Acl
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Role", inversedBy="acl")
     */
    protected $role;

    /**
     * @var bool
     *
     * @ORM\Column(name="company_index", type="boolean")
     */
    private $companyIndex;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set companyIndex
     *
     * @param boolean $companyIndex
     *
     * @return Acl
     */
    public function setCompanyIndex($companyIndex)
    {
        $this->companyIndex = $companyIndex;

        return $this;
    }

    /**
     * Get companyIndex
     *
     * @return bool
     */
    public function getCompanyIndex()
    {
        return $this->companyIndex;
    }
}

