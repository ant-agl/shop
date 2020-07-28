<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketPlaceRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }

        // if (!$order || $order->products->count() < 1) {
        //     session()->flash('warning', 'Корзина пуста');
        //     return redirect()->back();
        // }

        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        $order = false;
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        if (!$order || $order->products->count() < 1) {
            session()->flash('warning', 'Корзина пуста');
            return redirect()->route('index');
        }

        return view('basket-place', compact('order'));
    }

    public function basketConfirm($orderId, BasketPlaceRequest $req)
    {
        $order = Order::find($orderId);

        $success = $order->saveOrder($req->name, $req->phone);

        if ($success) {
            session()->flash('success', 'Заявка отправлена');
        } else {
            session()->flash('warning', 'Произошла ошибка');
        }

        Order::eraseOrderSum();

        return redirect()->route('index');
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotProducts = $order->products->find($productId)->pivot;
            $pivotProducts->count++;
            $pivotProducts->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);
        Order::changeFullSum($product->price);

        session()->flash('success', 'Добавлен товар ' . $product->title);
        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotProducts = $order->products->find($productId)->pivot;
            if ($pivotProducts->count < 2) {
                $order->products()->detach($productId);
                // if ($order->products->count() < 2) {
                //     session()->flash('warning', 'Корзина пуста');
                //     return redirect()->route('index');
                // }
            } else {
                $pivotProducts->count--;
                $pivotProducts->update();
            }
        }

        $product = Product::find($productId);
        Order::changeFullSum(-$product->price);

        session()->flash('warning', 'Удален товар ' . $product->title);
        return redirect()->route('basket');
    }
}
