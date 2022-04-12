<?php

namespace App\Repositories;

use App\Helpers\AppHelper;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }

    /**
     * Pagintated with $query being query that might be different to each model
     * @param $query
     * @param $meta
     * @return array
     */
    public function paginatedWithQuery($meta, $query = null): array
    {
        if(!$query){
            $query = $this->model;
        }
        return $this->offsetAndSort($query, $meta);
    }

    /**
     * store data
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        return $this->model->create($input);
    }

    /**
     * Update Data
     * @param $input
     * @param $modelObj
     * @return mixed
     */
    public function update($input, $modelObj)
    {
        $modelObj->update($input);
        return $modelObj;
    }

    public function delete(Model $modelObj)
    {
        return $modelObj->delete();
    }

    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }
    /**
     * @param $id
     * @param bool $failure
     * @return Model|null
     */
    public function find($id, bool $failure = true)
    {
        if ($failure) {
            return $this->model->findOrFail($id);
        }else{
            return $this->model->find($id);
        }
    }


    /**
     * require initial query and meta data, and will return the data from the range in correct order
     * @param $query
     * @param $meta
     * @return array
     */
    public function offsetAndSort($query, $meta){
        $total = $query->count();
        $meta = AppHelper::additionalMeta($meta, $total);
        $query->orderBy($meta['order'], $meta['dir']);
        if ($meta['perPage'] != '-1') {
            $query->offset($meta['offset'])->limit($meta['perPage']);
        }

        $results = $query->get();

        return [
            'results'  => $results,
            'meta'     =>  $meta
        ];
    }
}
