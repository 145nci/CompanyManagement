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
     * @var array
     *
     * @ORM\Column(name="allowedActions", type="text", nullable=false)
     */
    private $allowedActions;


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
     * Set role
     *
     * @param \CompanyManagementBundle\Entity\Role $role
     *
     * @return Acl
     */
    public function setRole(\CompanyManagementBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \CompanyManagementBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set allowedActions
     *
     * @param string $allowedActions
     *
     * @return Acl
     */
    public function setAllowedActions($allowedActions)
    {
        $this->allowedActions = $allowedActions;

        return $this;
    }

    /**
     * Get allowedActions
     *
     * @return string
     */
    public function getAllowedActions()
    {
        return $this->allowedActions;
    }
}
