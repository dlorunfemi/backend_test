<?php

namespace App\Repositories;

use App\Interfaces\Repository as InterfacesRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Repository implements InterfacesRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($reqs)
    {
        $model = $this->model->create($this->formatRequest($reqs));

        return $model;
    }

    public function formatRequest($reqs, $model_id = null)
    {
        $formatted = [];

        foreach ($reqs as $key => $value) {
            $formatted[$key] = $value;
        };

        $options = array();

        $formatted['options'] = $options;

        return $formatted;
    }

    public function findOrFail($id, $field = 'message')
    {
        $model = $this->model->info()->find($id);

        if (!$model) {
            throw ValidationException::withMessages([$field => 'Not Found']);
        }

        return $model;
    }

    public function update(Model $model, $reqs)
    {

    }

    public function deletable($id)
    {
        $model = $this->findOrFail($id);

        return $model;
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

}
