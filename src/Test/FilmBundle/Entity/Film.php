<?php

namespace Test\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Test\CommonBundle\Entity\Tag;

/**
 * Film
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\FilmBundle\Entity\FilmRepository")
 */
class Film
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
     * @var integer $quality
     *
     * @ORM\ManyToOne(targetEntity = "Quality", inversedBy = "films" )
     * @ORM\JoinColumn(name = "quality_id", referencedColumnName = "id")
     */
    protected $quality;

    /**
     * @var integer $actors
     *
     * @ORM\ManyToMany(targetEntity = "Actor", inversedBy = "films" )
     * @ORM\JoinTable(name="films_actors")
     */
    protected $actors;

    /**
     * @var integer $tags
     *
     * @ORM\ManyToMany(targetEntity = "Test\CommonBundle\Entity\Tag", inversedBy = "films" )
     * @ORM\JoinTable(name="films_tags")
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
     * @return Film
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
     * @return Film
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
     * @param int $quality
     * @return Quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param int $actors
     * @return Actor
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * @return int
     */
    public function getActors()
    {
        return $this->actors;
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
