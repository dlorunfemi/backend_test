<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function getAll();

    public function create($reqs);

    public function findOrFail($id, $field = 'message');

    public function update(Model $model, $reqs);

    public function deletable($id);

    public function delete(Model $model);
}
