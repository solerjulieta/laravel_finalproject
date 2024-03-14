<?php
/** @var \App\MercadoPago\ManejoPago $payment */
?>
@extends('layouts.main')

@section('title', 'Compra')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('{{ $payment->getPublicKey() }}', {
            locale: 'es-AR',
        });

        mp.checkout({
            preference: {
                id: '{{ $payment->getPaymentId() }}'
            },
            render: {
                container: '.checkout'
            }
        });
    </script>
@endpush

@section('main')
    <section class="container">
        <h1>Confirmar compra</h1>
        <p>Detalle de compra</p>
        @foreach ($payment->getItems() as $item)
            <p>Curso: {{ $item->getTitle() }}</p>
            <p>Total: ${{ $item->getUnitPrice() }}</p>
        @endforeach
        <p>Modalidad: {{ $modalidad->nombre }}</p>
        <p>Horario: {{ $horario->dias->nombre }} de {{ $horario->horas->ingreso }} a {{ $horario->horas->egreso }}hs.</p>
        <div class="checkout"></div>
    </section>
@endsection