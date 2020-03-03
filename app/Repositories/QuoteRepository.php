<?php

namespace App\Repositories;

use App\Model\QuoteModel;
use App\Repositories\BaseRepository;


class QuoteRepository extends BaseRepository
{
    protected $all;
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
        
        dd($this->all);
    }

    public function format($all , $params){
        $min = 0;
        $response = [];
        foreach($all as $k => $row){
            if($row->from ==  $params['from']){
                if($min < $row->price && $row->to == $params['to']){
                    $min = $row->price; 
                    $response = [
                        'route' => $row->from . "," . $row->to,
                        'price' => $row->price 
                    ]; 
                    continue;
                }
            }elseif( $row->to == $params['to']){
                $min = $row->price; 
               
                foreach($all as $row2){
                    if($row2->from ==  $row->from){
                        if($min < $row2->price && $row2->to == $row->to){
                            dd('x');
                            $min = $min + $row->price ; 
                            $response = [
                                'route' => $row->from . "," .$row2->from . "," . $row2->to,
                                'price' => $min
                            ]; 
                            return $response;
                        }
                }

                return $response; 
            }
        }
    }
}
}
