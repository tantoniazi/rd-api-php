<?php

namespace App\Http\Controllers;

use App\Repositories\QuoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class QuoteController extends Controller
{
    private  $repository;

    public function __construct(QuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @OA\Get(
     *      path="/quote/from/to/",
     *      operationId="quote",
     *      tags={"quote"},
     *      summary="Buscar rota mais barata",
     *      description="Buscar rota mais barata",
     *      @OA\Parameter(
     *          name="from",
     *          description="origem",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="to",
     *          description="destino",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="sucess"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="error"
     *       )
     *     )
     */

    public function index(Request $request , $from , $to){
        try{
            Validator::make($request->all(), [
                'from' => 'string',
                'to' => 'string'
            ])->validate();
        
        $all =  $this->repository->get([
            'from' => $from , 
            'to' => $to
        ]);
        return response(json_encode($all));
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        } catch (ValidationException $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     *
     * @OA\Post(
     *      path="/route",
     *      operationId="route",
     *      tags={"route"},
     *      summary="salvar rota nova",
     *      description="salvar rota nova",
     *      @OA\Parameter(
     *          name="from",
     *          description="origem",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="to",
     *          description="destino",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="price",
     *          description="preço",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="sucess"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="error"
     *       )
     *     )
     */
    public function store(Request $request){
        try {

            Validator::make($request->all(), [
                'from' => 'string',
                'to' => 'string',
                'price' => 'integer',
            ])->validate();

            $params = $request->all();


            $row = $this->repository->create($params);

            return $this->sendResponse(['from' => $row->from , 'to' => $row->to , 'price' => $row->price], '');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        } catch (ValidationException $e) {
            return $this->sendError($e->getMessage());
        }
    }
    
}
