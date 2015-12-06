<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class Team
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="team", cascade={"persist"})
     */
    protected $players;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trainer", mappedBy="team", cascade={"persist"})
     */
    protected $trainers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * Team constructor.
     */
    function __construct()
    {
        $this->players = new ArrayCollection();
        $this->trainers = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param Player $player
     * @return Player
     */
    public function addPlayer(Player $player)
    {
        $player->setTeam($this);
        $this->players->add($player);
        return $this;
    }

    /**
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * @return mixed
     */
    public function getTrainers()
    {
        return $this->trainers;
    }

    /**
     * @param Trainer $trainer
     * @return $this
     */
    public function addTrainer(Trainer $trainer)
    {
        $trainer->setTeam($this);
        $this->trainers->add($trainer);
        return $this;
    }

    /**
     * @param Trainer $trainer
     */
    public function removeTrainer(Trainer $trainer)
    {
        $this->players->removeElement($trainer);
    }
}
