<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all();
    /**
     * returns paginated data with data, and meta with metadata like total page, order dir...,
     * @param $query
     * @param $meta
     * @return mixed
     */
    public function paginatedWithQuery($meta, $query = null);

    /**
     * store data on the related model
     * @param $input
     * @return mixed
     */
    public function store($input);

    /**
     * update data of the related modelObj (instance of Model)
     * @param $input
     * @param $modelObj
     * @return mixed
     */
    public function update($input, $modelObj);

    /**
     * returns model or returns 404
     * @param $id
     * @param bool $failure
     * @return mixed
     */
    public function find($id, bool $failure = true);

    /**
     * delete the passed model
     * model should be passed instead of int id
     * @param Model $modelObj
     * @return mixed
     */
    public function delete(Model $modelObj);

    /**
     * id or string (comma separated) or array or collection of ids need to be passed
     * @param $ids
     * @return mixed
     */
    public function destroy($ids);

    /**
     * @param $query
     * @param $meta
     * @return mixed
     */
    public function offsetAndSort($query, $meta);
}
