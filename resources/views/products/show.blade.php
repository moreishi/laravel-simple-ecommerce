@extends('layouts.vuetify')

@section('content')

<v-container>
    <v-row>
        
        <v-card width="640" variant="outlined" class="border-0">
            <v-card-text>

            @if (session()->has('error'))
            <v-alert color="danger mb-5">
                <span class="text-white">{{session()->get('error')}}</span>
            </v-alert>
            @endif

                <v-card title="{{$product->name}}" subtitle="{{$product->author}}"  round="0" class="mb-5">
                    <v-card-text>
                        <p>{{$product->description}}</p>
                    <v-card-text>
                </v-card>

                <v-card title="What you will learn" class="mb-5">
                    <v-card-text>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </v-card-text>
                </v-card>

                <v-card-text>
                    <p class="h4">Contents</p>
                </v-card-text>

                <v-expansion-panels class="mb-5">
                    <v-expansion-panel
                        title="Content 1"
                        text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima"
                    >
                    </v-expansion-panel>
                    <v-expansion-panel
                        title="Content 2"
                        text="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo"
                    >
                    </v-expansion-panel>
                    <v-expansion-panel
                        title="Content 3"
                        text="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt"
                    >
                    </v-expansion-panel>
                    <v-expansion-panel
                        title="Content 4"
                        text="Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur"
                    >
                    </v-expansion-panel>
                </v-expansion-panels>

                
                <v-card variant="outlined" class="border-0 mb-5">
                    <v-card-text>
                        <p class="h3">Requirements</p>
                        <ul>
                            <li>Fast and reliable internet connection.</li>
                        </ul>
                    </v-card-text>
                </v-card>

                <v-card title="Product Description" class="mb-5">
                    <v-card-text>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
                    </v-card-text>
                </v-card>

            </v-card-text>
            
        </v-card>

        <v-card width="320" variant="outlined" class="border-0">
            <v-card-text>
                <v-img src="{{ $product->image }}"></v-img>
                <v-card>
                    <v-card-text>
                        <p class="h4"><currency></currency>{{$product->price / 100}}</p>
                        <p class="text-muted">{{$product->author}}</p>
                        
                        @if(!is_null($hasFullAccess))
                            @if($hasFullAccess->status === 'COMPLETED')
                            <v-btn block color="success">PAID COURSE</v-btn>  
                            @endif
                        @else 
                            <v-btn block color="primary" href="{{ route('make.payment', ['productId' => $product->id]) }}">BUY NOW</v-btn>
                        @endif
                        <p class="pa-2 text-center text-muted">30-Day Money-Back Guarantee</p>
                    </v-card-text>
                </v-card>

            </v-card-text>
        </v-card>
    </v-row>
</v-container>

@endsection
