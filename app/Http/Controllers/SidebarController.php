<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\Fridge;
use App\Shoplist;

class SidebarController extends Controller
{
    //

    public function add_favorite($id){
		$user = auth()->user();
		$fav = new Favorite;
		$fav->recipe_id = $id;
		$user->favorites()->save($fav);
		return redirect()->back()->with('message', 'Recipe added to favorites');

	}

	public function fridge_item(Request $request){
		$user = auth()->user();
		$item = new Fridge;
		$item->item_name = $request->input('itemName');
		$item->recipe_id = $request->input('recipeID');
		$user->fridge()->save($item);
		return redirect()->back()->with('message', 'Item added to the fridge');
	}

	public function remove_fridge(Request $request){
		$item = Fridge::findOrFail($request->input('itemID'));
		$item->delete();
		return redirect()->back()->with('message', 'Item removed from your fridge');
	}
	public function remove_shop(Request $request){
		$item = Shoplist::findOrFail($request->input('itemID'));
		$item->delete();
		return redirect()->back()->with('message', 'Item removed from your shop list');
	}

	public function shop_item(Request $request){
		$user = auth()->user();
		$item = new Shoplist;
		$item->item_name = $request->input('itemName');
		$item->recipe_id = $request->input('recipeID');
		$user->shoplist()->save($item);
		return redirect()->back()->with('message', 'Item added to the fridge');
	}
}
