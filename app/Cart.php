<?php


class Cart
{

    public $items; //['id' =>['quantity' =>, 'price'=>, 'data'=> ]]
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

    public function addItem($id, $product){
        $price = (int) str_replace('$', '', $product->price);

        //if item already exists
        if(array_key_exists($id, $this->items)){
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
        // first item occurrence
        } else {
            $productToAdd = ['quantity'=> 1, 'price'=> $price, 'data'=> $product];
        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice += $price;
    }
}
