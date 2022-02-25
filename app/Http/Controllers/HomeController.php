<?php

namespace App\Http\Controllers;

use App\Models\Automobile;
use App\Models\AutomobileCategory;
use App\Models\AutomobileTips;
use App\Models\Category;
use App\Models\Tips;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index()
    {
        $tips = Tips::with('automobiles')->get();
        $automobiles = Automobile::get();
        $categories = Category::get();

        return view('home', compact('tips', 'automobiles', 'categories'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $tips = Tips::query()->whereHas(
            'automobiles.categories',
            function ($query) use ($search) {
                $query->where('category_id', 'LIKE', "%{$search}%");
            }
        )
            ->orWhereHas(
                'automobiles',
                function ($query) use ($search) {
                    $query->where('mark', 'LIKE', "%{$search}%");
                }
            )
            ->orWhereHas(
                'automobiles',
                function ($query) use ($search) {
                    $query->where('model', 'LIKE', "%{$search}%");
                }
            )
            ->get();
        if (empty($search)) {
            Tips::all();
        }
        if ($request->ajax()) {
            $view = view('tips', compact('tips'))->render();
            return response($view);
        }
        return view('home', compact('tips'));
    }
}
