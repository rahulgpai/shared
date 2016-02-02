<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/31/2016
 * Time: 1:01 AM
 */

namespace RTool\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class Blog
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="BlogRepository")
 * @ORM\Table(name="blog")
 */
class Blog
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer", name="bid")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $bid;

    /**
     * @var
     * @ORM\Column(type="string", name="title", length=100)
     */
    protected $title;

    /**
     * @var
     * @ORM\Column(type="text", name="summary", length=200)
     */
    protected $summary;

    /**
     * @var
     * @ORM\Column(type="text", name="content", length=2000)
     */
    protected $content;

    /**
     * @var
     * @ORM\Column(type="date", name="addedon")
     */
    protected $addedon;

    /**
     * @var
     * @ORM\Column(type="string", name="author", length=50)
     */
    protected $author;

    /**
     * @var
     * @ORM\Column(type="string", name="author_email", length=100)
     */
    protected $authorEmail;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="RTool\UserBundle\Entity\Comment", mappedBy="comments", orphanRemoval=true)
     * @ORM\OrderBy(value={"DESC"})
     */
    private $comments;

    /**
     * @return mixed
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param mixed $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAddedon()
    {
        return $this->addedon;
    }

    /**
     * @param mixed $addedon
     */
    public function setAddedon($addedon)
    {
        $this->addedon = $addedon;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param mixed $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}