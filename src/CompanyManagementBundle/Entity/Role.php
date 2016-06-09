<?php

namespace CompanyManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="CompanyManagementBundle\Repository\RoleRepository")
 */
class Role {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var array
     *
     * @ORM\Column(name="allowedActions", type="text", nullable=false)
     */
    private $allowedActions;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="User", mappedBy="role")
     */
    protected $users;

    /**
     * Set allowedActions
     *
     * @param string $allowedActions
     *
     * @return Acl
     */
    public function setAllowedActions($allowedActions) {

        $this->allowedActions = $allowedActions;

        return $this;
    }

    /**
     * Get allowedActions
     *
     * @return string
     */
    public function getAllowedActions() {

        return $this->allowedActions;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name) {

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {

        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Role
     */
    public function setTitle($title) {

        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {

        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Role
     */
    public function setDescription($description) {

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {

        return $this->description;
    }

    /**
     * Constructor
     */
    public function __construct() {

        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \CompanyManagementBundle\Entity\User $user
     *
     * @return Role
     */
    public function addUser(\CompanyManagementBundle\Entity\User $user) {

        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \CompanyManagementBundle\Entity\User $user
     */
    public function removeUser(\CompanyManagementBundle\Entity\User $user) {

        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers() {

        return $this->users;
    }

    public function __toString() {

        return $this->name;
    }
}
