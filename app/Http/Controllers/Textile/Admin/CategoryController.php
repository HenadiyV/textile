<?php

namespace App\Http\Controllers\Textile\Admin;


use App\Http\Requests\TextileCategoryCreateRequest;
use App\Http\Requests\TextileCategoryUpdateRequest;
use App\Models\TextileCategory;
use App\Repositories\TextileCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var TextileCategoryRepository
    */
    private $textileCategoryRepository;

    public function __construct(){

        parent::__construct();

        $this->textileCategoryRepository = app(TextileCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$paginator = TextileCategory::paginate(5);
         $paginator = $this->textileCategoryRepository->getAllWithPaginate(5);
        //dd(__METHOD__,$paginator);//
       return view('textile.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //==============================
       // $category= new TextileCategory();
       // dd($item);
        //$categoryList = TextileCategory::all();
        //=============================
       $category= new TextileCategory();
//

        $categoryList = $this->textileCategoryRepository->getForComboBox();
      //dd($categoryList);
        return view('textile.admin.categories.edit', compact('category','categoryList'));
       // dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TextileCategoryCreateRequest $request)
    {
        //dd(__METHOD__);

        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug']=Str::slug($data['title'],'-');
        }
        // создаст обьект но не добавит в БД способ 1
        $category = new TextileCategory($data);
       // dd($category);
        $category->save();
        // создаст обьект но не добавит в БД способ 2
        //$category = (new TextileCategory())->create($data);
        /**/
        if($category) {
            return redirect()->route('textile.admin.categories.edit', [$category->id])
                ->with(['succes' => 'Успешно сохранено']);
        } else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,TextileCategoryRepository $categoryRepository)
    {
        //===================
        //-----------------------------
       // $category=TextileCategory::findOrFail($id);//метод получения сущности//может вызвать 404 если использовать во вложениях
      // $category=TextileCategory::find($id);//метод получения сущности
        //$categories=TextileCategory::where('id','=',$id)->first();//метод получения сущности
       // ------------------------------
        //$categories[]=TextileCategory::where('id','=',$id)->first();//метод получения сущности
        //dd(collect($categories->pluck('id')));// посмотреть
       // -----------------------------------

        // $categoryList=TextileCategory::all();
//==========================
       //
        $category = $this->textileCategoryRepository->getEdit($id);
        //dd($category);
        if(empty($category)){
            abort(404);
        }
        $categoryList=$this->textileCategoryRepository->getForComboBox();
        //dd(__METHOD__);
        return view('textile.admin.categories.edit', compact('category','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TextileCategoryUpdateRequest $request, $id)
    {

        //dd(__METHOD__, $request->all(),$id);
        //$id=111;
        //----------------------------
        //validation
      /*
      $rules=[
            'title'          =>  'required|min:3|max:500',
              'info_category'   =>  'string|min:5|max:200',
           'slug'           =>  'max:200',

           'parent_id'  =>  'required|integer|exists:textile_categories,id',
       ] ;
      */
       //$validatedData=$this->validate($request,$rules);// способ 1

       //$validatedData=$this->$request->validate($rules);// способ 2

        /*  $validator= \Validator::make($request->all(),$rules);// способ 3

          // способы валидирования с помощью $validator
       /* $validatedData[]= $validator->passes();//выводит true if all good
        // $validatedData[]= $validator->validate();
         $validatedData[]= $validator->valid();//выводит только правильные даные
         $validatedData[]= $validator->failed();//выводит только не правильные даные
         $validatedData[]= $validator->errors();//выводит текстовые сообщения ошибок
         $validatedData[]= $validator->fails();// true если что то плохо
         */
       //------------------------
        //$category=TextileCategory::find($id);
        //dd($category);
        $category= $this->textileCategoryRepository->getEdit($id);
        if(empty($category)){
            return back()
                ->withErrors(['msg'=>"Запись id=[{$id}] не найдена"])
                ->withInput();
        }
        $data=$request->all();//получение данных из $request
        if(empty($data['slug'])){
            $data['slug']=Str::slug($data['title'],'-');
        }
       // $data=$request->input();//получение данных из $request второй способ
      // dd($data);
        $result=$category
            ->fill($data)
            ->save();
        // или можно сразу второй способ сохранения в базу
       // $result=$category->update($data);
      //  dd($result);
        if($result){
            return redirect()
                ->route('textile.admin.categories.edit',$category->id)
                ->with(['success'=>'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg'=>"Ошибка сохранания"])
                ->withInput();
        }
    }


}
