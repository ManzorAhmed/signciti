<?php

namespace App;
use Illuminate\Support\Arr;

class Cart
{
    private $contents;
    private $totalQty;
    private $totalPrice;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->contents = $oldCart->contents;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduct($product, $qty)
    {
        $products = [
            'qty' => 0,
            'total_price' => $product->total_price,
            'product' => $product
        ];
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $products = $this->contents[$product->id];
            }
        }
        $products['qty'] += $qty;
        $products['total_price'] = $product->total_price * $products['qty'];
        $this->contents[$product->id] = $products;
        $this->totalQty += $qty;
        $this->totalPrice += $product->total_price;
    }

    public function removeProduct($product)
    {
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $rProduct = $this->contents[$product->id];
                $this->totalQty -= $rProduct['qty'];
                $this->totalPrice -= $rProduct['total_price'];
                Arr::forget($this->contents, $product->id);
            }
        }
    }

    public function updateProduct($product, $qty)
    {
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $products = $this->contents[$product->id];
            }
        }
        $this->totalQty -= $products['qty'];
        $this->totalPrice -= $products['total_price'];
        $products['qty'] = $qty;
        $products['total_price'] = $product->total_price * $qty;
        $this->totalPrice += $products['total_price'];
        $this->totalQty += $qty;
        $this->contents[$product->id] = $products;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function getTotalQty()
    {
        return $this->totalQty;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}
