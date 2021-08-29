<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

use App\Order;
use App\Image;
use App\Address;
use Mail;
use Zipper;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrder;
use App\Mail\OrderStatus;
use Exception;

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
            'image' => 'required|array|min:1',
            'image.*' => 'string',
            'combination_id.*' => 'required|numeric',
            'qty.*' => 'required|numeric',
            'firstname' => 'required|min:3|max:255|string|alpha',
            'lastname' => 'required|min:3|max:255|string|alpha',
            'email' => 'required|min:4|max:255|email',
            'cgv' => 'required|accepted',
            'payment_id' => 'required|numeric',
            'newsletter' => 'required',
            'street' => 'required|min:3|max:255|string|string',
            'home_number' => 'required|min:1|max:255|string',
            'flat_number' => 'min:0|max:255',
            'postcode' => 'required|min:5|max:6|string',
            'city' => 'required|min:3|max:255|string',
            'phone_number' => 'required|numeric|digits:9',
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

        $address = new Address;
        $address->order_id = $order->id;
        $address->street = $request->input('street');
        $address->home_number = $request->input('home_number');
        $address->flat_number = $request->input('flat_number');
        $address->post_code = $request->input('postcode');
        $address->city = $request->input('city');
        $address->phone_number = $request->input('phone_number');
        $address->save();

        $id_combinations = $request->input('combination_id');
        $quantities = $request->input('qty');
        $names = $request->input('image');

        foreach ($names as $key => $name) {
    
            // if(!Storage::disk('local')->exists('/public/images/orders/'.$order->id.'/'.$name))
            //     Storage::copy('/tmp/'.$name, '/public/images/orders/'.$order->id.'/'.$name);

            $image = new Image;
            $image->order_id = $order->id;
            $image->name = $name;
            $image->combination_id = (int)$id_combinations[$key];
            $image->qty = (int)$quantities[$key];
            $image->saveAndStore();

            // Storage::delete('/tmp/'.$name);
        }

        $order->total_price = $order->getTotalPrice();
        $order->save();

        
        try {
            Mail::to($order->email)->send(new OrderConfirmation($order));
            Mail::to(env('MAIL_FROM_ADDRESS', 'adamskifotografia@gmail.com'))->send(new NewOrder($order));
        } catch (Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
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

        if ($order->status_id != 1) {
            Mail::to($order->email)->send(new OrderStatus($order));
        }

        return redirect()->back()->with('success', 'Status zamówienia został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->address()->delete();
        
        foreach ($order->images as $image) {
            $image->delete();
        }

        $return = [
            'order' => $order->delete()
        ];

        return $return;
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
    public function storeImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg|max:15360',
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = str_replace('.'.$extension, "", $file->getClientOriginalName()) . '_' . Password::getRepository()->createNewToken() . '.' . $extension;

        $path = $file->storeAs('tmp', $fileName);

        return $fileName;
    }

    /**
     * download the order images.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $order_id = $request->input('order_id');
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $order_id.".zip";
        
        Zipper::make(public_path("/storage/images/orders/".$order_id.'.zip'))
                ->add(public_path()."/storage/images/orders/".$order_id.'/')->close();

        return response()->download(public_path("/storage/images/orders/".$fileName), $fileName, $headers);
    }
}
