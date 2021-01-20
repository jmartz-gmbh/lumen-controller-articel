<?php

namespace App\Http\Controllers;

use \http\Env\Response;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class ArticelController extends Controller
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function select(Request $request){
        $validation = $this->validate($request, [
            'filter' => 'array|required',
            'orderby' => 'array|required'
        ]);

        $connection = DB::table('articels');

        $articels = $connection->get();

        $this->addData('articels',$articels);
        $this->addMessage('success','All your Articels.');

        return $this->getResponse();
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function view(Request $request){
        $validation = $this->validate($request, [
            'id' => 'bail|required|integer'
        ]);

        $id = $request->input('id');

        $comment = DB::table('articels')
            ->where('id','=',$id);

        $count = $comment->count();

        if($count === 1){
            $this->addData('comment',$comment->first());
            $this->addMessage('success','Your Articel.');
        }
        else{
            $this->addMessage('success','Articel doesnt exists.');
        }

        return $this->getResponse();
    }
}
