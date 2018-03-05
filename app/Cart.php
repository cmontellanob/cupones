<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $cupon = null;
    public $discount =null;
    public $state =null;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->cupon = $oldCart->cupon;
            $this->discount =$oldCart->discount;
            $this->state =$oldCart->state;
            
        }
        else 
            { $this->setState(new Emptystate());}
    }
        public function state()
	{
		return $this->state;
	}
         public function reset()
	{
	    $this->items = null;
            $this->totalQty =0;
            $this->totalPrice = 0;
            $this->cupon = null;
            $this->discount =null;
            $this->state =null;
	}

	public function setState(CartState $state)
	{
		$this->state = $state;
	}

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item['price'], 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item['price'] * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item['price'];
    }
}
