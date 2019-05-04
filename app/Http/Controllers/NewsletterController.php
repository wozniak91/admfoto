<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Newsletter;
use App\Order;
use Mail;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::get();
        $email_list = [];

        foreach ($orders as $key => $order) {
            if(!in_array($order->email, $email_list)) {
                $email_list[] = $order->email;
            } else {
                unset($orders[$key]);
            }
        }

        $newsletter =  Newsletter::findOrFail(1);

        return view('admin.newsletter.index', compact('orders', 'newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsletter = Newsletter::findOrFail(1);

        $newsletter->content = $request->input('content');
        $newsletter->save();

        $subscribes = $request->input('subscribes');
       
        foreach ($subscribes as $id) {
            
            $order = Order::findOrFail($id);

            $mail = Mail::send([], [], function($message) use ($newsletter, $order) {
                $message->from('wozniak.rafal.91@gmail.com', 'Fotoadamski');
                $message->to($order->email);
                $message->subject('Newsletter Fotoadamski');
                $message->setBody($newsletter->content, 'text/html');
            });

        }

        return [
            'send' => true
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
