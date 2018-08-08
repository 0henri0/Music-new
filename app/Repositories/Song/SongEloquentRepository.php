<?php
namespace App\Repositories\Song;

use App\Repositories\EloquentRepository;
use App\Repositories\Song\SongRepositoryInterface;

class SongEloquentRepository extends EloquentRepository implements SongRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {

        return \App\Models\Song::class;
    }

}
