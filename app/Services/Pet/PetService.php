<?php

namespace app\Services\Pet;

use App\Models\Pet;
use App\Models\PetNames;
use App\Services\BaseService;

class PetService extends BaseService
{
    protected array $rules = [];


    public function createPet(array $data)
    {
        $this->rules = [
            'name' => 'required|string|max:255',
            'type' => 'required',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer',
            'weight' => 'required|integer',
            'gender' => 'required',
            'color' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'vaccinated' => 'required|boolean',
            'pet_condition' => 'required'
        ];
        $this->validate($data);
        $pet = Pet::class->create($data);
        $this->addName($pet->id, $data['name']);

    }


    public function uploadImage(array $data)
    {
        $this->rules = [
            'image' => 'required|image|max:2048',
        ];
        $this->validate($data);
        $pet = Pet::class->findOrFail($data['pet_id']);
        $pet->update(['image' => $data['image']]);
    }


    /**
     * @param array $data
     * @return void
     */
    public function updateName(array $data)
    {
        $this->rules = [
            'id' => 'required|integer',
            'name' => 'required|string|max:255'
        ];
        $this->validate($data);
        $pet = Pet::class->findOrFail($data['id']);
        $pet->update(['name' => $data['name']]);
        $this->addName($data['id'], $data['name']);

    }

    public function addName($id, $name)
    {
        PetNames::create([
            'pet_id' => $id,
            'user_id' => auth()->user()->id,
            'pet_name' => $name,
            'start_date' => now(),
        ]);
    }

}
