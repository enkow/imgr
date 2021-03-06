<?php
/**
 * Role
 *
 * @author Grzesiek Stefański <gstefanski@cntech.pl>
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Role
 *
 * @author Grzesiek Stefański <gstefanski@cntech.pl>
 * @package AppBundle\Entity
 *
 * @ORM\Table(
 *     name="roles"
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\RoleRepository"
 * )
 */
class Role
{
    /**
     * Role admin id
     */
    const ROLE_ADMIN = 1;

    /**
     * Role user id
     */
    const ROLE_USER = 2;

    /**
     * Primary key.
     *
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Role name
     *
     * @var string $name
     *
     * @ORM\Column(
     *     type="string",
     *     length=255,
     *     nullable=false
     * )
     */
    protected $name;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
