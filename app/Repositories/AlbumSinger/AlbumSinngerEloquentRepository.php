<?php
namespace App\Repositories\AlbumSinger;

use App\Repositories\EloquentRepository;

class AlbumSingerloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\AlbumSinger::class;
    }

}
