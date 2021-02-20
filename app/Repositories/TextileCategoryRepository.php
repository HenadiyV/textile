<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\TextileCategory as Model;
use Illuminate\Support\Facades\DB;
//use Your Model

/**
 * Class TextileCategoryRepository.
 */
class TextileCategoryRepository extends CoreRepository
{
    /**
    * Получить модель для редактирорвания в админке
     *
     * @param int $id
     * @return model
     */
    public function getEdit($id){

        $res= $this->startConditions()->find($id);//->first($id);
       // dd($res);
         return $res;
    }

/**
 * @return string
 */
protected function getModelClass(){
    return Model::class;
}

/**
 * получить список категорий для вывода в выпадающий список
 *
 * @return collection
*/
public function getForComboBox(){
   // return $this->startConditions()->all();
    $columns=implode(', ', [
        'id',
        'CONCAT(id,". ",title) AS caption_title',
    ]);

//  $result=$this->startConditions()->all();//[]

//    $result =$this
//        ->startConditions()
//        ->select('textile_categories.*',
//            DB::raw('CONCAT(id,". ",title) AS caption_title'))
//        ->toBase()
//        ->get();

    $result = $this
        ->startConditions()
        ->selectRaw($columns)
        ->toBase()
        ->get();
   //dd($result);
return $result;
}
/**
 * получить категории для вывода пагинатором
 *
 * @param int|null  $perPage
 *
 * @return |Illuminate\Contracts\Pagination\LengthAwarePaginator
 */
public function getAllWithPaginate($perPage = null){
    $columns=['id','title','parent_id'];
    $result=$this
        ->startConditions()
        ->select($columns)
        ->paginate($perPage);
    //dd($result);
    return $result;
}

}
