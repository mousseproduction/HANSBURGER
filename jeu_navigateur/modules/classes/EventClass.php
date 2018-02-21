<?php

class Event 
{
    private $id;
    private $partieId;
    private $actionId;
    private $carte1PartieId;
    private $carte2PartieId;
    private $herosPartieId;


    /**********************************************
     * GET THE VALUE OF id
     *********************************************/ 
    public function getId()
    {
        return $this->id;
    }

    /**********************************************
     * SET THE VALUE OF id
     *
     * @return  self
     *********************************************/ 
    public function setId($id)
    {
        if( is_int( $id ) && $id >= 0 ) 
        {
            $this->id = $id;
        }
        return $this;
    }

    /**********************************************
     * GET THE VALUE OF partieId
     *********************************************/ 
    public function getPartieId()
    {
        return $this->partieId;
    }

    /**********************************************
     * SET THE VALUE OF partieId
     *
     * @return  self
     *********************************************/ 
    public function setPartieId($partieId)
    {
        $this->partieId = $partieId;

        return $this;
    }

    /**********************************************
     * GET THE VALUE OF actionId
     *********************************************/ 
    public function getActionId()
    {
        return $this->actionId;
    }

    /**********************************************
     * SET THE VALUE OF actionId
     *
     * @return  self
     *********************************************/ 
    public function setActionId($actionId)
    {
        $this->actionId = $actionId;

        return $this;
    }

    /**********************************************
     * GET THE VALUE OF carte1PartieId
     *********************************************/ 
    public function getCarte1PartieId()
    {
        return $this->carte1PartieId;
    }

    /**********************************************
     * SET THE VALUE OF carte1PartieId
     *
     * @return  self
     *********************************************/ 
    public function setCarte1PartieId($carte1PartieId)
    {
        $this->carte1PartieId = $carte1PartieId;

        return $this;
    }

    /**********************************************
     * GET THE VALUE OF carte2PartieId
     *********************************************/ 
    public function getCarte2PartieId()
    {
        return $this->carte2PartieId;
    }

    /**********************************************
     * SET THE VALUE OF carte2PartieId
     *
     * @return  self
     *********************************************/ 
    public function setCarte2PartieId($carte2PartieId)
    {
        $this->carte2PartieId = $carte2PartieId;

        return $this;
    }

    /**********************************************
     * GET THE VALUE OF herosPartieId
     *********************************************/ 
    public function getHerosPartieId()
    {
        return $this->herosPartieId;
    }

    /**********************************************
     * SET THE VALUE OF herosPartieId
     *
     * @return  self
     *********************************************/ 
    public function setHerosPartieId($herosPartieId)
    {
        $this->herosPartieId = $herosPartieId;

        return $this;
    }
}
