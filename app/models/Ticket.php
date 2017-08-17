<?php
class Ticket
{
    private $id;
    private $title;
    private $component;
    private $description;

    public function __construct($id, $title, $component, $description)
    {
        $this->id  = $id;
        $this->title = $title;
        $this->component = $component;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getComponent()
    {
        return $this->component;
    }

    public function getShortDescription()
    {
        return $this->description;
    }
}
