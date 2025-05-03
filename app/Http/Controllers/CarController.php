<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Inertia\Inertia;
use Inertia\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Cars', [
            'cars' => Car::all(),
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
        return "hello from controller";
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        return "hello from controller";
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
