@extends('layouts.app')

@section('content')
<table>
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
<img src='/public/upload/product/product.jpg'>
@endsection
