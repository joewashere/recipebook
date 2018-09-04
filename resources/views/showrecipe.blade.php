@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">
                    <h1>{{ $recipe->title }}</h1>
                    <a href="/favorite/{{$recipe->id}}">Add Favorite</a>
                    <form method="POST" action="/recipe/{{$recipe->id}}">
                        <input class=" btn btn-sm btn-danger" type="submit" name="submit" value="Delete">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="card-body">
                    
                    <div class="info">
                        <small><strong>Prep Time: </strong>{{ $recipe->preptime }}</small>
                        <small><strong>Cook Time: </strong>{{ $recipe->cooktime }}</small>
                        <small><strong>Servings: </strong>{{ $recipe->servings }}</small>
                        <small><strong>Calories: </strong>{{ $recipe->calories }}</small>
                    </div>
                    <br />
                    <div class="ingredients">
                        <h2>Ingredients</h2>
                        <ol>
                        @foreach($recipe->ingredients as $ingredient)
                            <li>
                                <span>{{ $ingredient->ingredient }}</span>

                                <span class="float-right">
                                <a href="javascript:;" data-toggle="modal" data-target="#addModal" data-item-route="fridge" data-recipe-id="{{$ingredient->recipe->id}}"><i class="fas fa-box"></i>

</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#addModal" data-item-route="shoplist" data-recipe-id="{{$ingredient->recipe->id}}"><i class="fas fa-clipboard-list"></i>

</a>
</span>
                            </li>
                        @endforeach
                        </ol>
                    </div>
                    <br />
                    <div class="steps">
                        <h2>Steps</h2>
                        <ol>
                            @foreach($recipe->steps as $step)
                                <li>{{ $step->step }}</li>
                            @endforeach
                        </ol>
                    </div>

                </div>
            </div>



@endsection


