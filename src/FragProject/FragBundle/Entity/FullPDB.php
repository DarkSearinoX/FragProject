<?php

namespace FragProject\FragBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FullPDB
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FullPDB
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
     * @ORM\Column(name="FourLetterName", type="string", length=255)
     */
    private $FourLetterName;

    /**
     * @var string
     *
     * @ORM\Column(name="Resolution", type="string", length=255)
     */
    private $Resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="FullName", type="text")
     */
    private $FullName;


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
     * Set FourLetterName
     *
     * @param string $fourLetterName
     * @return FullPDB
     */
    public function setFourLetterName($fourLetterName)
    {
        $this->FourLetterName = $fourLetterName;
    
        return $this;
    }

    /**
     * Get FourLetterName
     *
     * @return string 
     */
    public function getFourLetterName()
    {
        return $this->FourLetterName;
    }

    /**
     * Set Resolution
     *
     * @param string $resolution
     * @return FullPDB
     */
    public function setResolution($resolution)
    {
        $this->Resolution = $resolution;
    
        return $this;
    }

    /**
     * Get Resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->Resolution;
    }

    /**
     * Set FullName
     *
     * @param string $fullName
     * @return FullPDB
     */
    public function setFullName($fullName)
    {
        $this->FullName = $fullName;
    
        return $this;
    }

    /**
     * Get FullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->FullName;
    }
}