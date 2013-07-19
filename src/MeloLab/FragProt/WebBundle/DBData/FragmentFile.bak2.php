<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Fragment File
 * @ORM\Entity
 * 
 */
class FragmentFile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @var File - not a persistent field! */
    private $file;
    
    /** @var string
     * @Column(type="string")
     */
    private $filePersistencePath;
    
    /**
     *  @var string 
     */
    protected static $uploadDirectory = null;
    
    
    static public function setUploadDirectory($dir)
    {
        self::$uploadDirectory = $dir;
    }
    static public function getUploadDirectory()
    {
        if (self::$uploadDirectory === null) 
        {
            throw new \RuntimeException("Trying to access upload directory for profile files");
        }
        return self::$uploadDirectory;
    }
    
    /**
     * Assumes 'type' => 'file'
     */
    public function setFile(File $file)
    {
        $this->file = $file;
    }
    
    public function getFile()
    {
        return new File(self::getUploadDirectory() . "/" . $this->filePersistencePath);
    }
    
    public function getFilePersistencePath()
    {
        return $this->filePersistencePath;
    }
    
    public function processFile()
    {
        if (! ($this->file instanceof UploadedFile) ) {
            return false;
        }
        $uploadFileMover = new UploadFileMover();
        $this->filePersistencePath = $uploadFileMover->moveUploadedFile($this->file, self::getUploadedDirectory());
    }
    
    // Getters for ID

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    
}