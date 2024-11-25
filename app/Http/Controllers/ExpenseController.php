<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\ExpenseModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{

    public function getIndex(Request $request){
        $user = Auth::user();

        $budget = $user->budget;

        $dateSorts = ExpenseModel::query();

        $sortOrder = $request->input('sort_order', 'asc');

        $dateSorts = $dateSorts->orderBy('created_at', $sortOrder)->get();

        $groupedByDate = $dateSorts->groupBy(function($dateSort) {
            return \Carbon\Carbon::parse($dateSort->created_at)->format('Y-m-d');
        });

        return view("index", compact("groupedByDate", "budget"));
    }


    public function getAddBudget(){
        return view("addBudget");
    }


    public function saveBudget(Request $request){
        $validate = $request->validate([
            'budget' => 'required|numeric|min:0'
        ]);

        $user = Auth::user();

        $user->budget = $validate['budget'];

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['budget' => $validate['budget']]);

        return redirect()->route("getIndex");
    }


    public function getIncome(Request $request){
        return view('income');
    }


    public function saveIncome(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'money' => 'required|numeric|min:0',
        ]);

        $income = ExpenseModel::create($validate);

        $user = Auth::user();

        $user->budget += $validate['money'];


        DB::table('users')
            ->where('id', Auth::id())
            ->update(['budget' => $user->budget]);

        return redirect()->route('getIndex');
    }


    public function delete(ExpenseModel $expense){
        $expense->delete();

        return redirect()->route('getIndex');
    }


    public function getConsumption(){
        return view('consumption');
    }


    public function saveConsumption(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'money' => 'required|numeric|min:0',
        ]);

        $income = ExpenseModel::create($validate);

        $user = Auth::user();

        $user->budget -= $validate['money'];


        DB::table('users')
            ->where('id', Auth::id())
            ->update(['budget' => $user->budget]);

        return redirect()->route('getIndex');
    }
}
