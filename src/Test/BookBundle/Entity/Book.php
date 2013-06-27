<?php

namespace Test\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Test\CommonBundle\Entity\Tag;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\BookBundle\Entity\BookRepository")
 */
class Book
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer $authors
     *
     * @ORM\ManyToMany(targetEntity = "Author", inversedBy = "books" )
     * @ORM\JoinTable(name="books_authors")
     */
    protected $authors;

    /**
     * @var integer $tags
     *
     * @ORM\ManyToMany(targetEntity = "Test\CommonBundle\Entity\Tag", inversedBy = "films" )
     * @ORM\JoinTable(name="books_tags")
     */
    protected $tags;


    public function __toString()
    {
        return $this->title;
    }

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
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $authors
     * @return Author
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param int $tags
     * @return Tag
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return int
     */
    public function getTags()
    {
        return $this->tags;
    }


}
