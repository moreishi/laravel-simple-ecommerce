@extends('layouts.vuetify')

@section('content')

<v-container>
    <v-row>
        <product-list :products="{{$products}}"></product-list>
    </v-row>
</v-container>

@endsection
