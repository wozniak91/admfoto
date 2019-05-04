<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

use App\Order;
use App\Image;
use App\Address;
use Mail;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrder;
use App\Mail\OrderStatus;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('created_at')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $this->validate($request, [
            // 'image' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'image' => 'required',
            'image.*' => 'string',
            'combination_id.*' => 'required|numeric',
            'qty.*' => 'required|numeric',
            'firstname' => 'required|max:255|string|alpha',
            'lastname' => 'required|max:255|string|alpha',
            'phone_number' => 'required|numeric|digits:9',
            'email' => 'required|max:255|email',
            'cgv' => 'required|accepted',
            'payment_id' => 'required|numeric',
            'newsletter' => 'required',
        ]);

       $order = new Order;

       $order->firstname = $request->input('firstname');
       $order->lastname = $request->input('lastname');
       $order->email = $request->input('email');
       $order->phone_number = $request->input('phone_number');
       $order->cgv = (bool)$request->input('cgv'); 
       $order->newsletter = (bool)$request->input('newsletter'); 
       $order->payment_id = $request->input('payment_id'); 

       $order->remember_token = Password::getRepository()->createNewToken();
       $order->save();

       $id_combinations = $request->input('combination_id');
       $quantities = $request->input('qty');
       $names = $request->input('image');

        foreach ($names as $key => $name) {
    
            if(!Storage::disk('local')->exists('/public/images/orders/'.$order->id.'/'.$name))
                Storage::copy('/tmp/'.$name, '/public/images/orders/'.$order->id.'/'.$name);

            $image = new Image;
            $image->order_id = $order->id;
            $image->name = $name;
            $image->combination_id = (int)$id_combinations[$key];
            $image->qty = (int)$quantities[$key];
            $image->save();

            Storage::delete('/tmp/'.$name);
        }

        $order->total_price = $order->getTotalPrice();
        $order->save();

       Mail::to($order->email)->send(new OrderConfirmation($order));
       Mail::to(env('MAIL_FROM_ADDRESS', 'raf123al@gmail.com'))->send(new NewOrder($order));
        
       return array(
            'order_id' => $order->id,
            'token' => $order->remember_token
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $address = $order->address;
        $images = $order->images;
        
        return view('admin.orders.show', compact('order', 'address', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = $request->input('status_id');
 
        $order->save();

        if($order->status_id != 1)
            Mail::to($order->email)->send(new OrderStatus($order));

        return  redirect()->back()->with('success', 'Status zamówienia został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOrderByToken($token)
    {

        return Order::where('remember_token', $token)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request) {

        $this->validate($request, [
            'image' => 'image|required|mimes:jpeg,png,jpg|max:20480',
        ]);

        $storage = Storage::disk('local')->put('/tmp', $request->file('image'));

        return basename($storage);

    }

    public function destroyImage($name) {



    }


}
