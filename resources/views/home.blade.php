@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/addrecipe">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url" class="form-control">
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" name="submit" value="Go" class="btn btn-primary">
                    </form>
                    <br /><br />
                    <h2>Recipes</h2>
                    <div class="list-group">
                    @foreach(Auth::user()->recipes as $recipe)
                        <div class="list-group-item">
                            <a href="/recipe/{{$recipe->id}}" class="list-group-link">{{ $recipe->title }}</a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
@endsection
