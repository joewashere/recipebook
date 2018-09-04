<div class="sidebar">
	<div class="card">
	    <div class="card-header">Fridge</div>

	    <div class="card-body">
	    	<div class="list-group">
	    	@if(Auth::user()->fridge->count() > 0)
	    		@foreach(Auth::user()->fridge as $item)
	    			<div class="list-group-item">
	    				<span>{{ $item->item_name }}</span>
	    				<span class="float-right">
	    					<a href="javascript:;" id="btnFridgeDelete" class="text-danger">
	    						<i class="fas fa-times-circle"></i>
	    					</a>
	    					<form method="POST" id="removeFridge" action="/removefridge">
	    						<input type="hidden" name="itemID" value="{{$item->id}}">
	    						<input type="hidden" name="_method" value="DELETE">
	    						{{ csrf_field() }}
	    					</form>
	    				</span>
	    			</div>
	    		@endforeach
	    	@else
	    		<div class="list-group-item">Your fridge is empty!</div>
	    	@endif
	    	</div>
	    </div>
	</div>

	<div class="card">
	    <div class="card-header">Shopping List</div>

	    <div class="card-body">
	    	<div class="list-group">
	    	@if(Auth::user()->shoplist->count() > 0)
	    		@foreach(Auth::user()->shoplist as $item)
	    			<div class="list-group-item">
	    				<span>{{ $item->item_name }}</span>
	    				<span class="float-right">
	    					<a href="" class="text-danger" id="btnShopDelete">
	    						<i class="fas fa-times-circle"></i>
	    					</a>
	    					<form method="POST" id="removeShop" action="/removeshop">
	    						<input type="hidden" name="itemID" value="{{$item->id}}">
	    						<input type="hidden" name="_method" value="DELETE">
	    						{{ csrf_field() }}
	    					</form>
	    				</span>
	    			</div>
	    		@endforeach
	    	@else
	    		<div class="list-group-item">Your shop list is empty!</div>
	    	@endif
	    	</div>
	    </div>
	</div>

	<div class="card">
	    <div class="card-header">Favorite Recipes</div>

	    <div class="card-body">
	    	<div class="list-group">
	    	@if(Auth::user()->favorites->count() > 0)
	    	@foreach(Auth::user()->favorites as $favorite)
	    		<a href="/recipe/{{$favorite->recipe->id}}" class="list-group-item list-group-link">{{ $favorite->recipe->title }}</a>
	    	@endforeach
	    	@else
	    		<div class="list-group-item">You don't have any favorites!</div>
	    	@endif
	    	</div>
	    </div>
	</div>
</div>