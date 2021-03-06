<?php

namespace App\Models;

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
            $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
        // first item occurrence
        } else {
            $productToAdd = ['quantity'=> 1, 'totalSinglePrice'=> $price, 'data'=> $product];
        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice += $price;
    }

    public function updatePriceAndQuantity(){
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item){
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['totalSinglePrice'];
        }

        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }
}
