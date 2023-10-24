<?php

namespace app\Services\Pet;

use App\Models\Pet;
use App\Models\PetNames;
use App\Services\BaseService;
use App\Services\EventService;

class PetService extends BaseService
{
    /**
     * Get the validation rules that apply to the service.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'internal_id' => 'nullable|string',
            'gender' => 'required',
            'breed' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable|string|max:255',
            'vaccinated' => 'nullable|boolean',
            'pet_condition' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',

            'status' => 'nullable|string',
            'behavior_id' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',

        ];
    }


    public function execute(array $data): Pet
    {
        $this->validate($data);

        $pet = $this->create($data);

        $this->uploadImage($data['image'], $pet);
        $this->addName($data['name'], $pet);
        $this->updateStatus($data['status'], $pet);
        $this->updatePetEvent($data, $pet);

        // we query the DB again to fill the object with all the new properties
        $pet->refresh();

        return $pet;
    }


    public function create(array $data): Pet
    {
        // filter out the data that shall not be updated here
        $dataOnly = Arr::except(
            $data,
            [
                'status',
                'behavior_id',
                'description'
            ]
        );

        if (!empty($internalId = Arr::get($data, 'internal_id')) && InternalId::isValid($internalId)) {
            $dataOnly['internal_id'] = $internalId;
        }

        return Pet::create($dataOnly);
    }


    public function uploadImage(string $image, Pet $pet)
    {
        $pet->update(['image' => $image]);
    }


    public function addName(string $name, Pet $pet)
    {

        $pet->update(['name' => $name]);

        PetNames::create([
            'pet_id' => $pet->id,
            'user_id' => auth()->user()->id,
            'pet_name' => $name,
            'start_date' => now(),
        ]);
    }

    public function updateStatus(string $status, Pet $pet)
    {
        $pet->update(['status' => $status]);
    }

    public function updatePetEvent(array $data, Pet $pet)
    {
        app(EventService::class)->execute([
            'title' => $data['title'],
            'type' => $data['type'],
            'date' => $data['date'],
            'pet_id' => $pet->id,
            'user_id' => auth()->user()->id,
            'pet_condition' => $data['pet_condition'],
        ]);
    }

}
