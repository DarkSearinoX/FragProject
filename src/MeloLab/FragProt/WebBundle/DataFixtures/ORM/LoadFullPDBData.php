<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\FullPDB;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadFullPDBData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $em = $this->container->get('doctrine')->getManager();
        
        // Reset ID column
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:FullPDB')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        //Read file contents
        $handle = fopen("/var/www/FragProject/src/MeloLab/FragProt/WebBundle/DBData/AllPdbStructures.csv", "r") or die("Couldn't get handle");
        if ($handle) {
            while (!feof($handle)) {
                $bufferArray = array();
                $buffer = fgets($handle, 8196);
                $buffer2 = str_replace("\"", "",$buffer);
                $buffer3 = str_replace("\n", "",$buffer2);
                $bufferArray = explode(',', $buffer3);
                
                if ($bufferArray[0] && $bufferArray[1] && $bufferArray[1])
                {
                    /* 01 */ 
                    $e = new FullPDB();

                    $e->setFourLetterName($bufferArray[0]);
//                    echo $e->getFourLetterName().' ';
                    $e->setResolution($bufferArray[2]);
//                    echo $e->getResolution().' ';
                    $e->setFullName($bufferArray[1]);
//                    echo $e->getFullName().'\n';

                    $manager->persist($e);
                    
                }
                
            }
            fclose($handle);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 4; // the order in which fixtures will be loaded
    }    
}