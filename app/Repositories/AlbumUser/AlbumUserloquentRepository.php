<?php

namespace App\Repositories\AlbumUser;

use App\Repositories\EloquentRepository;

class AlbumUserloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {

        return \App\Models\AlbumUser::class;
    }

}
