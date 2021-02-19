@extends('layouts.app')

@section('content')

    <div class="container">
<table><tr><th>ID</th><th>ID-Cat.</th><th>Art.</th><th>Name</th><th>Pur. price</th>
        <th>Sel. price</th><th>Count</th><th>Color</th><th>sales_count</th><th>description</th>
        <th>image</th><th>active_product</th><th>info_product</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
        <td>{{$item->category_id}}</td>
        <td>{{$item->article}}</td>
        <td>{{$item->product}}</td>
        <td>{{$item->purchase_price}}</td>
<td>{{$item->selling_price}}</td>
<td>{{$item->count}}</td>
<td>{{$item->color}}</td>
<td>{{$item->sales_count}}</td>
<td>{{$item->description}}</td>
<td>{{$item->image}} </td>
<td>{{$item->active_product}}</td>
<td>{{$item->info_product}}</td>

        </tr>
        @endforeach

</table>
    </div>
<img src='../../../../public/upload/product/product.jpg'>
@endsection
