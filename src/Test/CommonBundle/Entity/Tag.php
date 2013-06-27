<?php

namespace Test\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Test\FilmBundle\Entity\Film;
use Test\BookBundle\Entity\Book;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\CommonBundle\Entity\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $films
     *
     * @ORM\ManyToMany(targetEntity = "Test\FilmBundle\Entity\Film", mappedBy = "tags")
     */
    private $films;

    /**
     * @var integer $books
     *
     * @ORM\ManyToMany(targetEntity = "Test\BookBundle\Entity\Book", mappedBy = "tags")
     */
    private $books;


    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Tag
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

    /**
     * @param int $books
     * @return Book
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * @return int
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param int $films
     * @return Film
     */
    public function setFilms($films)
    {
        $this->films = $films;

        return $this;
    }

    /**
     * @return int
     */
    public function getFilms()
    {
        return $this->films;
    }
}
