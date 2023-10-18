<?php

namespace App\Services;

class EventService extends BaseService
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'required',
            'date' => 'required',
            'pet_id' => 'required',
            'user_id' => 'required',
            'pet_condition' => 'required'
        ];
    }

    public function execute(array $data)
    {
        $this->validate($data);
        Event::create($data);
    }
}
