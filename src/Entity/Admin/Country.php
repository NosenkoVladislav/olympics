<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\PositiveOrZero()
     */
    private $goldMedalAmount;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero()
     */
    private $silverMedalAmount;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero()
     */
    private $bronzeMedalAmount;


    /**
     * @ORM\Column(type="string")
     */
    private $countryCode;


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

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

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode): void
    {
        $this->countryCode = $countryCode;
    }
}
