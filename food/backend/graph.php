<?php
 class graph
 {
    private $graph;

    public function __construct($data)
    {
        $this->graph = array();
    }
    public function makeGraph($data,$key)
    {
        foreach($data as $row)
        {
            $this->graph[$key] = array();
            $this->graph[$key]['id'] = $row['id'];
        }
        return $this->graph;
    }
    //returns the graph
    public function getGraph()
    {
        return $this->graph;
    }
    //add one data to the graph
    public function addData($data,$key)
    {
        $this->graph[$key] = array();
        $this->graph[$key]['id'] = $data['id'];
    }
    public function getId($key)
    {
        return $this->graph[$key]['id'];
    }

 }
?>