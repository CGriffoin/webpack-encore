<?php

namespace App\Entity;

class User implements UserInterface
{
    private $id;
    private $name;

     /**
      * @ORM\Column(type="string", unique=true)
      */
     private $apiToken;

     public function __construct($pId, $pName) {
     	$this.setId($pId);
     	$this.setName($pName);
     	return $this;
     }

     // Getters and Setters
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @param mixed $apiToken
     *
     * @return self
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this;
    }
}