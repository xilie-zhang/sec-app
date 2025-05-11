<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = [];
        foreach (Car::all() as $car) {
            $car = array_values($car->toArray());
            $car[] = '<a href="/cars/'.$car[0].'/edit" class="edit">edit</button> <button class="delete" value="'.$car[0].'" >cancella</button>';
            $cars[]= $car;
        }
        // dd($cars);
        return Inertia::render('Cars', [
            'cars' => $cars,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $x = Car::create($request->validate([
                'name' => ['required', 'max:50'],
                'color' => ['required', 'max:50'],
                'price' => ['required', 'decimal:2']
            ]));
          return to_route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return "hello from controller";
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return Inertia::render('Carshow', [
            'car' => $car,
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
         $car->update($request->validate([
                'name' => ['required', 'max:50'],
                'color' => ['required', 'max:50'],
                'price' => ['required', 'decimal:2']
        ]));
          return to_route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Car $car)
    {
        $car->delete();
    }
}
