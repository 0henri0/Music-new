<?php

namespace App\Repositories\Country;

use App\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\EloquentRepository;

class CountryEloquentRepository extends EloquentRepository implements CountryRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {

        return \App\Models\Country::class;
    }

}
