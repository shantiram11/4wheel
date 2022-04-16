<?php

namespace App\Interfaces;

interface LocationRepositoryInterface
{
    public function paginatedWithQuery($meta, $query = null );
}
