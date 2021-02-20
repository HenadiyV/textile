<?php

namespace App\Repositories;

//use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository.
 *
 * @package App\Repositories
 *
 * репоситорий работы с сущностью.
 * может выдавать наборы данных
 * не может создавать/изменять сущности
 */
abstract class CoreRepository //extends BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor
    */
    public function __construct(){
        $this->model = app($this->getModelClass());//делегируем создание Laravel функции( создавать обьекты которые могут быть заменены)
        //$this->model = new $this->getModelClass();//так быстрее
    }

    /**
    * @return mixed
     */
    abstract protected function getModelClass();

    /**
    * @return Model|\Illuminate\Foundation\Application|mixed
     */
protected function startConditions(){
    return clone $this->model;
}
    /**
     * @return string
     *  Return the model
     */
   // public function model()
   // {
        //return YourModel::class;
   // }
}
