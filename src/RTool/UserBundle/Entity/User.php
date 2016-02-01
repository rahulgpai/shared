<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/29/2016
 * Time: 12:30 AM
 */

namespace RTool\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(name="username", type="string", length=30, unique=true)
     * @Assert\NotBlank()
     */
    protected $username;

    /**
     * @var
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $password;

    /**
     * @var
     * @ORM\Column(name="email", type="string", unique=true, length=50)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var
     * @ORM\Column(name="added_on", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    protected $addedOn;

    /**
     * @var
     * @ORM\Column(name="is_admin", type="boolean", nullable=true)
     */
    protected $isAdmin = 0;

    /**
     * @var
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    protected $isActive = 1;

    protected $salt;

    /**
     * @var
     * @ORM\Column(name="roles", type="json_array")
     */
    protected $roles = [];

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->setAddedOn(new \DateTime());
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        //$this->password = bcrypt($password);

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * @param mixed $addedOn
     */
    public function setAddedOn(\DateTime $addedOn)
    {
        $this->addedOn = $addedOn;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.

        $roles = $this->roles;

        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     *
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
        //return 'Salt value for md5';
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }


    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize([$this->id, $this->username, $this->email, $this->addedOn, $this->isActive, $this->isAdmin, $this->salt, $this->roles]);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.

        list($this->id, $this->username, $this->email, $this->addedOn, $this->isActive, $this->isAdmin, $this->salt, $this->roles) = unserialize($serialized);
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
}