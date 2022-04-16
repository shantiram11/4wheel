<?php

namespace App\Repositories;

use App\Helpers\AppHelper;
use App\Interfaces\LocationRepositoryInterface;

use App\Models\Location;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Location $model
     */
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    /**
     * Pagintated with $query being query that might be different to each model
     * @param $query
     * @param $meta
     * @return array
     */
    public function paginatedWithQuery($meta, $query = null ): array
    {
        $query = \DB::table('locations as m')
            ->select(
                'm.id',
                'm.latitude',
                'm.longitude',
                'm.created_at',
                'm.updated_at',
            );
        $query->where(function($q) use($meta){
            $q->orWhere('m.latitude', 'like', $meta['search'] . '%')
                ->orWhere('m.longitude', 'like', $meta['search'] . '%')
                ->orWhere('m.created_at', 'like', $meta['search'] . '%');
        });
        return $this->offsetAndSort($query, $meta);
    }

}

