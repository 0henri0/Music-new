<?php
namespace App\Repositories\Singer;

use App\Repositories\EloquentRepository;
use App\Repositories\Singer\SingerRepositoryInterface;

class SingerEloquentRepository extends EloquentRepository implements SingerRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {

        return \App\Models\Singer::class;
    }

    public function getAllSong($id)
    {

    }

}
