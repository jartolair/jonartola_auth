<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use App\User;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages_enviados=Message::where('from', Auth::user()->id)->get();
        $messages_recibidos=Message::where('to', Auth::user()->id)->get();

        return view('message.index', array('messages_enviados' => $messages_enviados,'messages_recibidos' => $messages_recibidos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|max:255|email',
            'about' => 'required|string|max:40',
            'message' => 'required|string|max:255',
            'link' =>'url|nullable',
        ]);
        date_default_timezone_set('Europe/Madrid');
        $message=new Message();
        $message->from=Auth::user()->id;

        $to=User::where('email',$request->input('to'))->first();
        if($to){
            $message->to=$to->id;
            $message->about=$request->input('about');
            $message->message=$request->input('message');
            $message->link=$request->input('link');
            $message->datetime=date('Y-m-j H:i:s');
            $message->save();
            return $this->index();
        }
        return view('message.create', ['noExiste'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=Message::find($id);
        return view('message.show',array('message'=>$message));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $message=Message::find($id);
        return view('message.edit',array('message'=>$message));
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
        $request->validate([
            'to' => 'required|max:255|email',
            'about' => 'required|string|max:40',
            'message' => 'required|string|max:255',
            'link' =>'url|nullable',
        ]);



        $message =Message::find($id);

        $message->from=Auth::user()->id;
        $to=User::where('email',$request->input('to'))->first();
        $message->to=$to->id;
        $message->about=$request->input('about');
        $message->message=$request->input('message');
        $message->link=$request->input('link');
        $message->datetime=date('Y-m-j H:i:s');
        $message->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=Message::find($id)->delete();
        return $this->index();
    }
}
