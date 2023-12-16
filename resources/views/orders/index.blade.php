@extends('layouts.vuetify')

@section('content')

<v-container>
    <v-row class="d-flex">

        @if($orders->count() < 1)
        <v-card title="Your orders will show here." variant="outlined" class="border-0"></v-card>
        @endif

        @foreach($orders as $order)
        <v-card class="flex-grow ma-1" width="320">
            <v-card-text>
                <v-img src="{{$order->product->image}}"></v-img>
                <p class="h3">{{$order->product->name}}</p>
                <p class="text-muted">{{$order->product->author}}</p>
                <v-btn block class="mb-2" color="primary" href="/products/{{$order->product->id}}" text="View FULL Course"></v-btn>
                <v-btn block href="/orders/{{$order->transaction_id}}" text="View Transaction"></v-btn>
            </v-card>
        </v-card>
        @endforeach

    </v-row>
    
</v-container>

@endsection
