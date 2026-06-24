<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $menuId => $item) {
            $subtotal = $item['harga'] * $item['qty'];
            $items[] = [
                'menu_id' => $menuId,
                'nama_menu' => $item['nama_menu'],
                'harga' => $item['harga'],
                'qty' => $item['qty'],
                'image' => $item['image'] ?? null,
                'subtotal' => $subtotal,
            ];
            $total += $subtotal;
        }

        return view('pages.keranjang', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function whatsapp()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang masih kosong.');
        }

        $messageLines = [
            'Halo, saya ingin memesan menu berikut:',
            '',
        ];

        $total = 0;

        foreach ($cart as $item) {
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
            $messageLines[] = '- ' . $item['nama_menu'] . ' x' . $item['qty'] . ' = Rp' . number_format($subtotal, 0, ',', '.');
        }

        $messageLines[] = '';
        $messageLines[] = 'Total belanja: Rp' . number_format($total, 0, ',', '.');
        $messageLines[] = 'Mohon dibantu proses pesanannya. Terima kasih.';

        $message = implode("\n", $messageLines);

        return redirect()->away('https://wa.me/6285266405735?text=' . urlencode($message));
    }

    public function store(Request $request, Menu $menu): RedirectResponse
    {
        $validated = $request->validate([
            'qty' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $quantity = $validated['qty'];
        $cart = session('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty'] += $quantity;
        } else {
            $cart[$menu->id] = [
                'nama_menu' => $menu->nama_menu,
                'harga' => (int) $menu->harga,
                'qty' => $quantity,
                'image' => $menu->image,
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Menu berhasil ditambahkan ke keranjang.');
    }

    public function destroy(int $menuId): RedirectResponse
    {
        $cart = session('cart', []);

        unset($cart[$menuId]);

        session(['cart' => $cart]);

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function clear(): RedirectResponse
    {
        session()->forget('cart');

        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
