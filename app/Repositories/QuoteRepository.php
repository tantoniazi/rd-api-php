<?php

namespace App\Repositories;

use App\Model\QuoteModel;
use App\Repositories\BaseRepository;


class QuoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        
        return QuoteModel::class;
    }

    
    public function get($params = [])
    {
        $all = $this->model->select(['from' , 'to' , 'price'])
            ->where(function ($query) use ($params) {

            if (!empty($params['from'])){
                $where = $query->where('from', $params['from']);
            }
            if (!empty($params['to'])){
                $where->ORwhere('to', $params['to']);
            }
        }) ->orderBY('price' , 'asc');

        return $this->format($all);
    }

    public function format($all){
        
    }
}
