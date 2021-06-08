<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $goldMedalAmount;

    /**
     * @ORM\Column(type="integer")
     */
    private $silverMedalAmount;

    /**
     * @ORM\Column(type="integer")
     */
    private $bronzeMedalAmount;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getGoldMedalAmount()
    {
        return $this->goldMedalAmount;
    }

    public function setGoldMedalAmount($goldMedalAmount)
    {
        $this->goldMedalAmount = $goldMedalAmount;
    }

    public function getSilverMedalAmount()
    {
        return $this->silverMedalAmount;
    }

    public function setSilverMedalAmount($silverMedalAmount)
    {
        $this->silverMedalAmount = $silverMedalAmount;
    }

    public function getBronzeMedalAmount()
    {
        return $this->bronzeMedalAmount;
    }

    public function setBronzeMedalAmount($bronzeMedalAmount)
    {
        $this->bronzeMedalAmount = $bronzeMedalAmount;
    }
}
