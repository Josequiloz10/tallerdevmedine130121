<?php

declare(strict_types=1);

namespace Medine\Gibmyx\Infrastructure\Repository;

use Medine\Gibmyx\Domain\Repository\PeliculasRepository;
use Medine\Gibmyx\Infrastructure\Models\Pelicula;

final class PeliculaEloquentRepository implements PeliculasRepository
{
    private $model;

    public function __construct(Pelicula $model)
    {
        $this->model = $model;
    }

    public function save(array $params): void
    {
        $this->model->create($params);
    }

    public function delete(int $id): void
    {
        $propuesta = $this->model->Find($id);
        if(!empty($propuesta))
            $propuesta->delete();
    }

    public function Find(int $id): ?Pelicula
    {
        return $this->model->find($id);
    }

    public function update(array $params): void
    {
        $id = (int) isset($params['id']) && !empty($params['id']) ?  $params['id'] : 0;

        if(empty($id))
            return;

        $model = $this->Find($id);

        if(empty($model))
            throw new \Exception("No se puede actualizar la pelicula");

        $model->update($params);
    }
}