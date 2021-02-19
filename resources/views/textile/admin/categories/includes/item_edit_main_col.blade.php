@php
/** @var \App\Models\TextileCategory $category */
/** @var \Illuminate\Support\Collection $categoryList */ //для работы с методами колекции
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                      <a  class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                  </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-panel active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Категория</label>
                            <input type="text" value="{{old('title',$category->title)}}"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Интедефикатор</label>
                            <input type="text" name="slug" value="{{old('slug',$category->slug)}}"
                            id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select type="text" name="parent_id" placeholder="Выберите категорию"
                                    id="parent_id" class="form-control" required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                    @if($categoryOption->id == $category->parent_id) selected @endif>
                                        {{$categoryOption->id }}.{{$categoryOption->title}}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="info_category">Описание</label>
                            <textarea name="info_category" id="info_category" cols="30" rows="3" class="form-control">
                                {{old('info_category',$category->info_category)}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>