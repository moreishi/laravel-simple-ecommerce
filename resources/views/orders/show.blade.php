@extends('layouts.vuetify')

@section('content')

<v-container>
    
<v-container>
    <v-row>
        
        <v-card width="640" variant="outlined" class="border-0">
            <v-card-text>

            @if (session()->has('error'))
            <v-alert color="danger mb-5">
                <span class="text-white">{{session()->get('error')}}</span>
            </v-alert>
            @endif

                <v-card title="{{$order->product->name}}" subtitle="{{$order->product->author}}"  round="0" class="mb-5">
                    <v-card-text>
                        <p>{{$order->product->description}}</p>
                    <v-card-text>
                </v-card>

                <v-card title="TRANSACTION" class="mb-5">
                    <v-card-text>
                        <p>{{$order->transaction_id}}</p>
                        <v-chip color="success" prepend-icon="mdi-check" class="mb-5">
                            PAID
                        </v-chip>
                        <p class="h6">COMPLTED AT: {{ $order->created_at }}</p>
                    </v-card-text>
                </v-card>

                

            </v-card-text>
            
        </v-card>

        <v-card width="320" variant="outlined" class="border-0">
            <v-card-text>
                <v-img src="{{ $order->product->image }}"></v-img>
                <v-card>
                    <v-card-text>
                        <p class="h4"><currency></currency>{{$order->product->price / 100}}</p>
                        <p class="text-muted">{{$order->product->author}}</p>
                        <v-btn block href="/products/{{$order->product->id}}" color="primary">VIEW FULL COURSE</v-btn>
                        <p class="pa-2 text-center text-muted">30-Day Money-Back Guarantee</p>
                    </v-card-text>
                </v-card>

            </v-card-text>
        </v-card>
    </v-row>
</v-container>

</v-container>

@endsection
