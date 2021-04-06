<?php


class Cart
{

    public $items;
    public $totalQuantity;
    public $totalPrice;
    /**
     * Cart constructor.
     */
    public function __construct($prevCart)
    {
        if($prevCart != null) {
            $this->items = $prevCart->items;
            $this->totalPrice = $prevCart->totalPrice;
            $this->totalQuantity = $prevCart->totalQuantity;
        } else {
            $this->items = [];
            $this->totalPrice = 0;
            $this->totalQuantity = 0;
        }
    }
}
