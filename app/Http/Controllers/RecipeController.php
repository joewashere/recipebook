<?php

namespace App\Http\Controllers;
require 'simple_html_dom.php';

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Step;


class RecipeController extends Controller
{
    //



	public function add_recipe(Request $request){
		$url = $request->input('url');

		if($this->parse_allrecipes($url)){
			return redirect()->back()->with('message', 'Recipie was added!');
		}else{
			return redirect()->back()->with('error', 'Oops, looks like something went wrong!');
		};

	}

	public function show_recipe($id){
		$recipe = Recipe::findOrFail($id);
		return view('showrecipe')->with('recipe', $recipe);
	}

	

	public function destroy($id){
		$recipe = Recipe::findOrFail($id);
		$recipe->ingredients()->delete();
		$recipe->steps()->delete();
		$recipe->favorites()->delete();
		$recipe->delete();
		return redirect('/home')->with('message', 'Recipe has been deleted');

	}

	



	private function parse_allrecipes($url){
		$html = file_get_html($url, false, null, 0);
		$title = $html->find('h1', 0);
		$cooktime = $html->find('.ready-in-time', 0);
		$servings = $html->find('meta[id=metaRecipeServings]', 0);
		$servings = $servings->getAttribute('content', 0);
		$calories = $html->find('.calorie-count', 0);
		$preptime = $html->find('time[itemprop=prepTime]', 0)->children();
		$ingredients1 = $html->find('.list-ingredients-1', 0)->children();
		$ingredients2 = $html->find('.list-ingredients-2', 0)->children();
		array_pop($ingredients2);
		$ingredients = array_merge($ingredients1, $ingredients2);
		$directions = $html->find('.step .recipe-directions__list--item');

		$user = auth()->user();
		$recipe = new Recipe;
		$recipe->title = $title->plaintext;
		$recipe->cooktime = $cooktime->plaintext;
		$recipe->preptime = $preptime[0]->plaintext;
		$recipe->servings = $servings;
		$recipe->calories = $calories->plaintext;

		if($user->recipes()->save($recipe)){
			
			foreach($ingredients as $key=>$value){
				$ingredient = new Ingredient;
				$ingredient->ingredient = trim($value->plaintext);
				$ingredient->ingredient_step = $key;

				if(!$recipe->ingredients()->save($ingredient)){
					return false;
				}
			}


			foreach($directions as $key=>$value){
				$step = new Step;

				$value = $value->plaintext;

				if($value != ' '){
					$step->step = $value;
					$step->step_number = $key;

					if(!$recipe->steps()->save($step)){
						return false;
					}	
				}
				
			}

			return true;


		}else{
			return false;
		}


	}

}
