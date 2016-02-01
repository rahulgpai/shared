<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/31/2016
 * Time: 1:15 AM
 */

namespace RTool\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="CommentRepository", )
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer", name="cid")
     */
    protected $cid;

    /**
     * @var
     * @ORM\Column(type="text", name="comments", length=2000)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Blog", inversedBy="comments")
     */
    protected $comments;

    /**
     * @var
     * @ORM\Column(type="string", name="comment_author", length=50)
     */
    protected $commentAuthor;

    /**
     * @var
     * @ORM\Column(type="string", name="commentor_email", length=100)
     */
    protected $commentorEmail;

    /**
     * @var
     * @ORM\Column(type="datetime", name="commented_on", nullable=true)
     */
    protected $commentedOn;

}