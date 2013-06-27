<?php

namespace Test\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\FilmBundle\Entity\ActorRepository")
 */
class Actor
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
     * @ORM\ManyToMany(targetEntity = "Film", mappedBy = "actors")
     */
    private $films;


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
     * @return Actor
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
