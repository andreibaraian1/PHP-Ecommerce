<?php

class Produs
{
    public $produs;
    public $cantitate;

    public function __construct($produs, $cantitate)
    {
        $this->produs = $produs;
        $this->cantitate = $cantitate;
    }
    public function __toString()
    {
        return "Produsul {$this->produs} cu cantitate {$this->cantitate}";
    }

}