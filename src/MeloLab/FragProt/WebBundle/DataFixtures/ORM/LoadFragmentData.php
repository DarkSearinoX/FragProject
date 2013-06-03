<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\Fragment;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadFragmentData implements FixtureInterface, ContainerAwareInterface
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
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:Fragment')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        //Read file contents
        $handle = fopen("/var/www/FragProject/src/MeloLab/FragProt/WebBundle/DBData/SIZE_7_DATA.txt", "r") or die("Couldn't get handle");
        if ($handle) {
            while (!feof($handle)) {
                $bufferArray = array();
                $buffer = fgets($handle, 4096);
                $bufferArray = explode('@', $buffer);
                echo $bufferArray[2];
                
                /* 01 */ 
                $e = new Fragment();
                $e->setSequence($bufferArray[2]);
                $manager->persist($e);
                
                break;
            }
            fclose($handle);
        }
        
        $manager->flush();
    }
}