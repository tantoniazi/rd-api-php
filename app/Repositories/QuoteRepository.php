<?php

namespace App\Repositories;

use App\Model\QuoteModel;
use App\Repositories\BaseRepository;


class QuoteRepository extends BaseRepository
{
    protected $all;
    public $min;

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
        $this->all = $this->model->select(['from' , 'to' , 'price'])
            ->where(function ($query) use ($params) {

            if (!empty($params['from'])){
                $where = $query->where('from', $params['from']);
            }
            if (!empty($params['to'])){
                $where->ORwhere('to', $params['to']);
            }
        }) ->orderBY('price' , 'asc')->get();
        $route =  $this->format($params);

        $array = [];
        $total = 0;
        foreach($route as $row){
            $array = array_unique(array_merge(explode(",", $row['route']) , $array));
            $total += $row['price'];
        }

        return [
            'route' => implode(',',$array),
            'price' => $total
        ];

    }

    public function format($params){
        $min = 0;
        foreach($this->all as $k => $row){
            if( $row->price && $row->from ==  $params['from']){
                    $this->min += $row->price; 
                    $response[] = [
                        'route' => $row->from . "," . $row->to,
                        'price' => $row->price 
                    ]; 
                    return $response;
            }elseif($row->price && $row->to == $params['to']){
                $this->min += $row->price; 
                $response =  $this->format(['from' => $row->from , 'to' => $row->to]);
            }
        }
        return $response;
    }
}
