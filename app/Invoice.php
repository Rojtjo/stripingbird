<?php

namespace App;

class Invoice
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var
     */
    private $total;

    /**
     * @var
     */
    private $paid;

    /**
     * @var
     */
    private $due;

    /**
     * Invoice constructor.
     * @param string $id
     * @param $total
     * @param $paid
     * @param $due
     */
    public function __construct($id, $total, $paid, $due)
    {
        $this->id = $id;
        $this->total = $total;
        $this->paid = $paid;
        $this->due = $due;
    }

    /**
     * @return bool
     */
    public function hasBeenPaid()
    {
        return false;
    }

    /**
     *
     */
    public function getTotal()
    {
        return $this->total;
    }
}
