<?php

namespace Test\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="Test\BookBundle\Entity\AuthorRepository")
 * @Gedmo\TranslationEntity(class="Test\BookBundle\Entity\AuthorTranslation")
 */
class Author
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
     * @Gedmo\Translatable
     */
    private $name;

    /**
     * @var integer $books
     *
     * @ORM\ManyToMany(targetEntity = "Book", mappedBy = "authors")
     */
    private $books;

    /**
     * @ORM\OneToMany(
     *  targetEntity="AuthorTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     */
    private $translations;


    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Author
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

    public function getTranslations()
    {
        return $this->translations;
    }

    public function addTranslation(AuthorTranslation $translation)
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setObject($this);
        }
    }

    /**
     * Remove translation
     *
     * @param AboutTranslation
     */
    public function removeTranslation($translation)
    {
        $this->translations->removeElement($translation);
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
