<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        foreach (Car::all() as $car) {
            $car = array_values($car->toArray());
            $car[] = '<input type="checkbox" id="'.$car[0].'" name="cars[]" value="'.$car[0].'">';
            $cars[]= $car;
        }
        return Inertia::render('Dashboard', [
            'cars' => $cars,
          ]);
    }

    public function checkout(Request $request)
    {
        $cars = $request->cars;
        $order = Order::create([
            'user_id' => auth()->user()->id,
        ]);

        $order->cars()->sync($cars);

        return Inertia::render('Checkout', [
            'cars' => $order->cars,
        ]);
    }

}
