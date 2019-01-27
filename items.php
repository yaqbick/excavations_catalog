<?php 

trait JsonSerializer {
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

class items implements \JsonSerializable  //tworzenie obiektów
{
    protected $id;
    protected $name;
    protected $community;
    protected $county;
    protected $latitude;
    protected $longitude;
    protected $azp;
    protected $chronology;

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getCommunity()
    {
        return $this->community;
    }

    function getCounty()
    {
        return $this->county;
    }

    function getLatitude()
    {
        return $this->latitude;
    }

    function getLongitude()
    {
        return $this->longitude;
    }

    function getAzp()
    {
        return $this->azp;
    }

    function getChronology()
    {
        return $this->chronology;
    }


    function setId($id)
    {
        $this->id=$id;
    }

    function setName($name)
    {
        $this->name=$name;
    }

    function setImage($image)
    {
        $this->image=$image;
    }

    function setChronology($chronology)
    {
        $this->chronology=$chronology;
    }

    function __construct($id, $name, $community, $county, $latitude, $longitude, $azp, $chronology)
    {
        $this->id=$id;
        $this->name=$name;
        $this->community=$community;
        $this->county=$county;
        $this->latitude=$latitude;
        $this->longitude=$longitude;
        $this->azp=$azp;
        $this->chronology=$chronology;

    }
    use JsonSerializer;
}
?>