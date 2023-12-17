<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

class AdminController extends Controller
{
   public function user()
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $users = User::all();
            return view('Admin.users',compact('users'));

         }else{

            return redirect()->back();

         }

      }else{

         return redirect('login');

      }
   
   }

   public function delete_user($id)
   {
    
      if(Auth::id()){

         if(Auth::User()->user_type == 1)

         {
            $delete_user = User::find($id);
            $delete_user->delete();
            return redirect()->back();

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }

    
   }

   public function delete_menu($id)
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $delete_menu = Food::find($id);
            $delete_menu->delete();
            return redirect()->back();

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }
     
   }

   public function food_menu()
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $foods = Food::all();  
            return view('Admin.food_menu',compact('foods'));

         }else{

            return redirect()->back();

         }
      }
      else{

         return redirect('login');

      }
      
   }

   public function update_view($id)
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $food = Food::find($id);
            return view('Admin.update_view',compact('food'));

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }
    
   }

   public function update(Request $request , $id)
   {
      $food = Food::find($id);

      if($request->hasfile('file'))
      {
         $img = $request->file('file');
         $image_name = time() . '.' . $img->getClientOriginalExtension();
         $request->file('file')->move('Food_Images',$image_name);
         $food->image = $image_name;
      }

         $food->title = $request->title;
         $food->price = $request->price;
         $food->description = $request->description;
         $food->save();
         return redirect()->back();
   
   }

   public function upload_food(Request $request)
   {
      $Food = new Food();
      
      if($request->hasfile('file'))
            {

            $imge = $request->file('file');
            $image_name = time() . '.' .  $imge->getClientOriginalExtension();
            $request->file('file')->move('Food_Images',$image_name);
            $Food->image = $image_name;

            }

            $Food->title = $request->title;
            $Food->price = $request->price;
            $Food->description = $request->description;
            $Food->save();
            return redirect()->back();
   }

   public function view_reservation()
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $reservations = Reservation::all();
            return view('Admin.reservation',compact('reservations'));
         }
         else{

            return redirect()->back();

         }
       
      }
      else{

         return redirect('login');

      }
     
   }

   public function view_chef()
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $chefes = Chef::all();
            return view('Admin.chef',compact('chefes'));

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }
      

   }

   public function upload_chef(Request $request)
   {
     $upload_chef = new Chef();

     if($request->hasfile('image'))
     {
         $img = $request->file('image');
         $image_name = time() . '.' . $img->getClientOriginalExtension();
         $request->file('image')->move('Chefes_Image', $image_name);
         $upload_chef->image = $image_name;

     }

         $upload_chef->name = $request->name;
         $upload_chef->speciality = $request->speciality;
         $upload_chef->save();
         return redirect()->back();
   }

   public function update_chef($id)
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $chef = Chef::find($id);
            return view('Admin.update_chef',compact('chef'));

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }
     
   }

   public function edit_chef(Request $request , $id)
   {
      $edit_chef = Chef::find($id);

      if($request->hasfile('image'))
      {
         $img = $request->file('image');
         $image_name = time() . '.' . $img->getClientOriginalExtension();
         $request->file('image')->move('Chefes_Image',$image_name);
         $edit_chef->image = $image_name;
      }

         $edit_chef->name = $request->name;
         $edit_chef->speciality = $request->speciality;
         $edit_chef->save();

         return redirect()->back();
   }

   public function delete_chef($id)
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $delete_chef = Chef::find($id);
            $delete_chef->delete();
            return redirect()->back();

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');

      }
    
   }

   public function orders()
   {
      if(Auth::id())
      {
         if(Auth::User()->user_type == 1)
         {
            $Orders = Order::all();
            return view('Admin.orders',compact('Orders'));

         }else{

            return redirect()->back();

         }
      }else{

         return redirect('login');
         
      }
     
   }

   public function search(Request $request)
   {
     $Search = $request->search;
     $Orders = Order::where('user_name' , 'Like' , '%' . $Search . '%')->
     orWhere('food_name' , 'Like' , '%' . $Search . '%')->get();
     return view('Admin.orders',compact('Orders'));
   }
}

