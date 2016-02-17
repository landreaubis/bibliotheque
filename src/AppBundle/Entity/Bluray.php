<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bluray")
 */
class Bluray
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    protected $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer", type="string", length=20, nullable=true)
     */
    protected $trailer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", options={"default":true})
     */
    protected $available;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    protected $type;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $title
     *
     * @return Bluray
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $description
     *
     * @return Bluray
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param string $picture
     *
     * @return Bluray
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
    
    /**
     * @param string $trailer
     *
     * @return Bluray
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTrailer()
    {
        return $this->trailer;
    }
    
    /**
     * @param string $available
     *
     * @return Bluray
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAvailable()
    {
        return $this->available;
    }
    
    /**
     * @param string $type
     *
     * @return Bluray
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}