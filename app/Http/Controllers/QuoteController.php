<?php

namespace App\Http\Controllers;

use App\Repositories\QuoteRepository;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    private  $repository;

    public function __construct(QuoteRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request , $from , $to){
        $all =  $this->repository->get([
            'from' => $from , 
            'to' => $to
        ])->get();
        return response(json_encode($all));
    }
    
}
