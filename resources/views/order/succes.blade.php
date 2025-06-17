@extends('layouts.app')
@section('title', 'Order Success')

@section('content')
    <h2>Transaksi Berhasil!</h2>
    <p>ID Transaksi: {{ $transaction->idTransaction }}</p>
    <p>Tanggal: {{ $transaction->date }}</p>
    <p>Total: Rp{{ number_format($transaction->total, 0, ',', '.') }}</p>

    <h3>Detail:</h3>
    <ul>
        @foreach ($transaction->items as $item)
            <li>{{ $item->product->name }} - {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}" class="btn">Kembali ke Beranda</a>
@endsection
