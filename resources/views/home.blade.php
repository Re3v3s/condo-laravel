@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <input type="hidden" value="{{Auth::id()}}">
@foreach ($datas as $data)
<p>{{$data->firstname}}</p>
@foreach ($data->order as $order)

<p>-> {{$order->total_price}}</p>

@endforeach
<hr>
@endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
