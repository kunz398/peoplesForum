<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use DateTime;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $id = auth()->user()->id;

        //update user active time
        $affected = DB::table('users')
            ->where('id', $id)
            ->update(['updated_at' => now()]);

        $status = DB::table('users')->where('id', $id)->value('status');

        $listFiledValues = DB::table('occupation')->select('occupation')->get();

        return view('home')->with('status', $status)->with('occupation_list', $listFiledValues);

    }

    public function post_user_detail(Request $request)
    {
        $input = $request->all();
        $user_id = auth()->user()->id;

        $user_img = rand(1, 20);
        $user_img .= '.png';
        DB::table('user_details')->insert([
            'user_id' => $user_id,
            'occupation' => $input['occupation'],
            'dob' => $input['dob'],
            'created_at' => now(),
            'updated_at' => now(),
            'user_img' => $user_img
        ]);

        //update user table status to be 1
        $affected = DB::table('users')
            ->where('id', $user_id)
            ->update(['status' => 1]);

        return response()->json(['success' => 'Data is successfully added']);

    }

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('posts')->orderBy('created_at', 'desc')->where('status', '=', '1')->simplePaginate(5);
            return view('load_question', compact('data'))->render();
        }
    }

    public function load_question_here()
    {

        $status = DB::table('users')->where('id', @auth()->user()->id)->value('status');

        $data = DB::table('posts')->orderBy('created_at', 'desc')->where('status', '=', '1')->simplePaginate(5);

        return view('main_page', compact('data', 'status'));
    }

    public function get_username($user_id)
    {
        $name = DB::table('users')->where('id', $user_id)->value('name');
        return $name;
    }

    public function get_user_img($user_id)
    {
        $user_img = DB::table('user_details')->where('user_id', $user_id)->value('user_img');

        $user_img = asset('img/user_img') . '/' . $user_img;
        return $user_img;
    }

    public function split_tags($tags)
    {
        $tags = explode(',', $tags);
        $html_content = "";
        foreach ($tags as $tag) {
            $html_content .= "<span class='badge rounded-pill bg-danger tags_inside'>$tag</span>";
        }

        return ($html_content);
    }

    public function add_more_words($current_word)
    {
        $word_me = $current_word;
        $current_word_count = \Illuminate\Support\Str::length(($current_word));
        for ($i = $current_word_count; $i <= 35; $i++) {
            $word_me .= "&nbsp; &nbsp; &nbsp; &nbsp;";
        }
        return $word_me;
    }
public function get_comment_count($post_id){
    $count = DB::table('comments')
        ->where('post_id','=',$post_id)
        ->count();
return $count;
}
    public function fetch_vote_up(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $user_id = auth()->user()->id;
            $vote_type_from_user = $input['vote_type'];

            $vote_ret = DB::table('post_votes_tables')
                ->where('user_id', '=', $user_id)
                ->where('post_id', '=', $input['data_id'])
                /*->where('type', '=', '+')
                ->orWhere('type', '=', '-')*/
                ->get();
            $votes = json_decode($vote_ret);
            $vote_num_from_db = DB::table('posts')->where('id', $input['data_id'])->value('vote_num');

        }
        if ($vote_ret->isEmpty()) {
            DB::table('post_votes_tables')->insert([
                'user_id' => $user_id,
                'post_id' => $input['data_id'],
                'type' => $vote_type_from_user,
                'updated_at' => now()
            ]);
            if ($vote_type_from_user == "+") {
                $vote_num_from_db = $vote_num_from_db + 1;
            } elseif ($vote_type_from_user == "-") {
                $vote_num_from_db = $vote_num_from_db - 1;
            } else {
                //do nothing
            }
            $posts = DB::table('posts')
                ->where('id', $input['data_id'])
                ->update([
                    'vote_num' => $vote_num_from_db,
                    'updated_at' => now(),
                ]);
            return $vote_num_from_db;
        } else {
//            update
            if ($votes[0]->type == $vote_type_from_user) {
//                do nothing show toast
                return $vote_type_from_user;
            } else {
                $update_post_votes_tables = DB::table('post_votes_tables')
                    ->where('id', $votes[0]->id)
                    ->update([
                        'type' => $vote_type_from_user,
                        'updated_at' => now(),
                    ]);

                if ($vote_type_from_user == '+') {
                    $vote_num_from_db = (int)$vote_num_from_db + 1;
                    $posts = DB::table('posts')
                        ->where('id', $votes[0]->post_id)
                        ->update([
                            'vote_num' => $vote_num_from_db,
                            'updated_at' => now(),
                        ]);

                    return $vote_num_from_db;
                } elseif ($vote_type_from_user == '-') {

                    $vote_num_from_db = (int)$vote_num_from_db - 1;

                    $posts = DB::table('posts')
                        ->where('id', $votes[0]->post_id)
                        ->update([
                            'vote_num' => $vote_num_from_db,
                            'updated_at' => now(),
                        ]);

                    return $vote_num_from_db;
                } else {
                    // do nothing
                }//!! else for vote type
            }// !!else for if db vote type and user vote type is same

        }//!!else for if nothing in table

    }

    public function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
