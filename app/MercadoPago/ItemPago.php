<?php

namespace App\MercadoPago;

use MercadoPago\Item;

class ItemPago
{
    public function __construct(
        private ?string $id = null,
        private string $title,
        private float $unit_price,
        private int $quantity,
    )
    {}

    public function getMPItem(): Item 
    {
        $item = new Item();
        $item->id = $this->id;
        $item->title = $this->title;
        $item->unit_price = $this->unit_price;
        $item->quantity = 1;

        return $item;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float 
    {
        return $this->unit_price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int 
    {
        return $this->quantity;
    }

    public function getSubtotal(): float 
    {
        return $this->getUnitPrice() * $this->getQuantity();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string 
    {
        return $this->id;
    }
}