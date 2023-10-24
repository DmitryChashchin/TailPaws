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
    private $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

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
    public function store(Request $request)
    {
        try {
            $pet = $this->petService->createPet([
                    'name' => $request->name,
                    'type' => $request->type,
                    'internal_id' => $request->internal_id,
                    'breed' => $request->breed,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'gender' => $request->gender,
                    'color' => $request->color,
                    'description' => $request->description,
                    'vaccinated' => $request->vaccinated,
                    'pet_condition' => $request->pet_condition,
                    'image' => $request->image,

                    'event_title' => $request->title,
                    'event_type' => EventType::Intake,
                    'event_date' => date('Y-m-d'),
                ]
            );
        } catch (ValidationException $e) {
            return back()
                ->withInput()
                ->withErrors($e->validator);
        }

        return redirect()->route('pets.index', [
            'pet' => $pet
        ]);
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
    public function update(Request $request, Pet $pet)
    {
        switch ($request->type) {
            case 'name':
                $this->petService->updateName([
                    'pet_name' => $request->name,
                    'pet_id' => $pet->id
                ]);
                break;
            case 'image':
                $this->petService->uploadImage([
                    'image' => $request->image,
                    'pet_id' => $pet->id
                ]);
                break;
            case 'status':
                $this->petService->updateStatus([
                    'status' => $request->status,
                    'pet_id' => $pet->id
                ]);
            case 'description':
                $this->petService->updateDescription([
                    'description' => $request->description,
                    'pet_id' => $pet->id
                ]);
                break;
            case 'location':
                $this->petService->updateLocation([
                    'location' => $request->location,
                    'pet_id' => $pet->id
                ]);

            default:
                break;
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
