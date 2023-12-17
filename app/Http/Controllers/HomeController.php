<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else{

            $foods = Food::all();
            $chefs = Chef::all();
            return view('home',compact('foods','chefs'));
        }
       
    }

    public function redirect()
    {
        $foods = Food::all();
        $chefs = Chef::all();

        $user_type = Auth::User()->user_type;

        if($user_type == '1')
        {
            return view('Admin.home');
        }
        else{

            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
            return view('home',compact('foods','chefs','count'));

        }
    }

    public function reservation(Request $request)
    {
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;
        $reservation->save();

        return redirect()->back();
    }

    public function add_cart(Request $request , $id)
    {
       if(Auth::id())
       {

        $user_id = Auth::id();

        $Cart = new Cart();

        $Cart->user_id = $user_id;
        $Cart->food_id = $id;
        $Cart->quantity = $request->quantity;
        $Cart->save();

        return redirect()->back();

       }
       else{

            return redirect('login');

       }
    }

    public function show_cart($id)
    {
       $count = Cart::where('user_id',$id)->count();

       if(Auth::id() == $id)
       {

        $carts = Cart::select('*')->where('user_id','=',$id)->get();
        $carts_join_foods = Cart::where('user_id' , $id)->join('food' , 'carts.food_id' , '=' , 'food.id')->get();
        return view('show_carts',compact('count','carts_join_foods','carts'));

       }

       else{

        return redirect()->back();

       }
     
    }

    public function remove($id)
    {
        if(Auth::id())
        {
            if(Auth::User()->user_type == 0)
            {
                $remove_cart = Cart::find($id);
                $remove_cart->delete();
                return redirect()->back();

            }else{

                return redirect()->back();

            }
        }else{

            return redirect('login');

        }
        
    }

    public function order_confirm(Request $request)
    {
        foreach ($request->food_name as $key => $value) {
           $Order = new Order();
           $Order->food_name = $value;
           $Order->price = $request->price[$key];
           $Order->quantity = $request->quantity[$key];
           $Order->user_name = $request->name; 
           $Order->phone = $request->phone;
           $Order->address = $request->address;

           $Order->save();

        }

        return redirect()->back();
    }
}

