<?php

namespace App\Http\Controllers;

use App\Enums\EventType;
use App\Http\Requests\PetRequest;
use App\Models\Pet;
use App\Models\PetNames;
use App\Services\EventService;
use app\Services\Pet\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();
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
    public function store(Request      $request,
                          PetService   $petService,
                          EventService $eventService)
    {

        try {
            $petService->createPet([
                    'name' => $request->name,
                    'type' => $request->type,
                    'breed' => $request->breed,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'gender' => $request->gender,
                    'color' => $request->color,
                    'description' => $request->description,
                    'vaccinated' => $request->vaccinated,
                    'pet_condition' => $request->pet_condition,
                ]
            );
            if ($request->has('image')) {
                $petService->uploadImage($request->image);
            }
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }

        $pet = Pet::create($request->validated());
        $pet->save();

        //Create intake event
        try {
            $eventService->execute([
                'title' => $request->title,
                'type' => EventType::Intake,
                'date' => date('d-m-Y'),
                'pet_id' => $pet->id,
                'user_id' => auth()->user()->id,
                'pet_condition' => $request->pet_condition,
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }
        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet, PetService $petService)
    {
        if ($request->has('name')) {
            $petService->updateName([
                'pet_name' => $request->name,
                'pet_id' => $pet->id
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
