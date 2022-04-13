<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function follow_a_page(Request $request)
    {
        @$user_id = auth()->user()->id;

        $follow_click_text = $request->follow_click_text;
        $post_id = $request->post_id;
        if ($follow_click_text == "Following") {
            DB::table('follow_discussions_tables')->insert([
                'post_id' => $post_id,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return "Following";
        } else {
            $deleted = DB::table('follow_discussions_tables')
                ->where('post_id', '=', $post_id)
                ->where('user_id', '=', $user_id)
                ->delete();
            return "Follow Discussion";
        }

    }
public function load_follow (Request $request){

    @$user_id = auth()->user()->id;

    $post_id = $request->post_id;

    $follow_discussions_tables = DB::table('follow_discussions_tables')->where('post_id', '=', $post_id)
        ->where('user_id', '=', $user_id)->count();
   if ($follow_discussions_tables >0){
       return "Following";
   }else{
       return "Follow Discussion";
   }

}

}
