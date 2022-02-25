<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automobile;
use App\Models\AutomobileCategory;
use App\Models\AutomobileTips;
use App\Models\Category;
use App\Models\Tips;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::get();
        $automobiles = Automobile::get();

        return view('admin.dashboard', compact('categories', 'automobiles'));
    }

    public function tips_store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'model' => ['required', 'exists:automobiles,model'],
            'mark' => ['required', 'exists:automobiles,mark'],
            'version' => ['exists:automobiles,version'],
            'text' => ['required'],
        ]);

        try {

            $tips = new Tips();
            $tips->text = $request->text;
            $tips->save();

            $automobile = new Automobile();
            $automobile->model = $request->model;
            $automobile->mark = $request->mark;
            $automobile->version = $request->version;
            $automobile->save();

            $automobile_category = new AutomobileCategory();
            $automobile_category->category_id = $request->category;
            $automobile_category->automobile_id = Automobile::latest()->pluck('id')->first();
            $automobile_category->save();

            $automobile_tips = new AutomobileTips();
            $automobile_tips->tips_id = Tips::latest()->pluck('id')->first();
            $automobile_tips->automobile_id = Automobile::latest()->pluck('id')->first();
            $automobile_tips->save();

            return redirect()->back()->with('message', 'Dica Enviada com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Algo deu errado..']);
        }
    }
}
