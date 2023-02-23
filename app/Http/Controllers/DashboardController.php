<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {

        $sales = Orders::all();

        $total = 0;

        foreach ($sales as $sale) {
        $total += $sale->price * $sale->qty;
        }

        return view('dashboard.components.index', [
            'users' => User::count(),
            'qty' => Orders::sum('qty'),
            'total' => $total,
            'sales' => $sales
        ]);
    }

    public function account() {

        $user = Auth::user();

        return view('dashboard.account.index', [
            'user' => $user
        ]);
    }

    public function security() {
        return view('dashboard.account.security');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        if(auth()->user()->role == 1){
            return redirect('/admin/dashboard')->with('success', 'Your password has been changed.');
        } else {
            return redirect('/')->with('success', 'Your password has been changed.');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        if(auth()->user()->role == 1){
            return redirect('/admin/dashboard')->with('success', 'Your password has been changed.');
        } else {
            return redirect('/')->with('success', 'Your password has been changed.');
        }
    }
}