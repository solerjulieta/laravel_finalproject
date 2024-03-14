<?php

namespace App\MercadoPago;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Collection;
use MercadoPago\Preference;
use MercadoPago\SDK;

class ManejoPago
{
    private Preference $preference;
    /** @var ItemPago[] */
    private array $items = [];
    private array $metadata = []; //17-10

    public function __construct()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
        $this->preference = new Preference();
    }

    /**
     * @param Collection|Curso[] $items
     * @return $this
     */
    public function setItems(Collection $items): self
    {
        $prefItems = [];

        /** @var Cursos $item */
        foreach($items as $item){
            $itemPago = new ItemPago(
                title: $item->nombre,
                unit_price: $item->precio,
                quantity: 1,
                id: $item->curso_id,
            );
            $this->items[] = $itemPago;

            $prefItems[] = $itemPago->getMPItem();
        }

        $this->preference->items = $prefItems;

        return $this;
    }

    /**
     * Define las URLs de retorno del pago. 
     * Aceptan 3 posibles claves: 
     * 'success', 'pending', 'failure'.
     * 
     * @param string|null $exito
     * @param string|null $pendiente
     * @param string|null $fallo
     * @return $this
     */
    public function setBackUrls(?string $success = null, ?string $pending = null, ?string $failure = null): self
    {
        $this->preference->back_urls = [
            'success' => $success,
            'pending' => $pending,
            'failure' => $failure,
        ];

        return $this;
    }

    /**
     * Agrega metadatos personalizados a la preferencia.
     * 
     * @param array $metadata
     * @return $this
     */
    public function setMetaData(array $metadata): self
    {
        $this->metadata = $metadata;
        $this->preference->metadata = $metadata;

        return $this;
    }

    /**
     * Prepara la preferencia para su cobro.
     * 
     * @return void
     * @throws \Exception
     */
    public function save()
    {
        $this->preference->save();
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach($this->getItems() as $item){
            $total += $item->getSubtotal();
        }

        return $total;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string 
    {
        return config('mercadopago.public_key');
    }

    /**
     * @return ItemPago[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getPaymentId(): string
    {
        return $this->preference->id;
    }
}