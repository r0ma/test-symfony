<?php

namespace Test\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quality
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\FilmBundle\Entity\QualityRepository")
 */
class Quality
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
     * @var integer $films
     *
     * @ORM\OneToMany(targetEntity = "Film", mappedBy = "quality")
     */
    private $films;


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
     * @return Quality
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
