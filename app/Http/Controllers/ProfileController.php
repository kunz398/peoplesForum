<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index($id)
    {
//        $id = auth()->user()->id;
        $users = DB::table('users')->where('id', $id)->get()->toArray();

        $user_details = DB::table('user_details')->where('user_id', $id)->get()->toArray();

        $total_votes = DB::table('posts')
            ->where('posted_by_user_id', $id)
            ->sum('vote_num');

        $total_comments_made = DB::table('comments')
            ->where('user_id', $id)
            ->count('id');

        $member_since = HomeController::time_elapsed_string($users[0]->created_at);

        $vote_per_month = DB::select("SELECT COUNT(vote_num) as vote_count_, DATE_FORMAT(`created_at`, '%m') AS month_ FROM `posts` where posted_by_user_id = $id GROUP BY month_;");
        $v_str = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($vote_per_month as $item) {
            $v_str[(int)$item->month_] = $item->vote_count_;
        }

        $counts_per_month = DB::select("SELECT COUNT(comment_text) as comment_text_ , DATE_FORMAT(`created_at`, '%m') AS month_ FROM `comments` where user_id = $id GROUP BY month_");
        $c_str = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($counts_per_month as $item) {
            $c_str[(int)$item->month_] = $item->comment_text_;
        }

        // ranking
        $total_users = DB::table('users')
            ->count('id');
        $rank_q = DB::select("select users.id ,SUM(posts.vote_num) as votes from users LEFT JOIN posts on users.id = posts.posted_by_user_id where users.id =$id GROUP BY users.id ");

//        foreach ($rank_q as $item){
        //   echo HomeController::get_username($item->id).' - ' . ((int) $item->votes / (int)$total_users) * 100; echo "<br>";
        $rank_value = ((int)($rank_q[0]->votes) / (int)($total_users)) * 100;

        if ($rank_value <= 0) {
            $rank_value = (1 / (int)($total_users)) * 100;
            $rank_value - 1;
        }

        /*
         * 0-20 - bronze #CD7F32
            21-40 - silver
            41 - 60 gold
            61-80 platnium  #94CF95
            81 -90 diamond #b9f2ff
            91 -100   #A2382B

        */
        $rank_value = (int)($rank_value);

        $color = "";
        $rank = "";
        if ($rank_value <= 20) {
            $color = "#CD7F32";
            $rank = "Bronze";
        }elseif ($rank_value >= 21 && $rank_value <= 40){
            $color = "silver";
            $rank = "Silver";
        }elseif ($rank_value >= 41 && $rank_value <= 60){
            $color = "gold";
            $rank = "Gold";
        }elseif ($rank_value >= 61 && $rank_value <= 80){
            $color = "#94CF95";
            $rank = "Platinum";
        }elseif ($rank_value >= 81 && $rank_value <= 90){
            $color = "#b9f2ff";
            $rank = "Diamond";
        }elseif ($rank_value >= 91 && $rank_value <= 100){
            $color = "#A2382B";
            $rank = "Patriot";
        }else{
            $color = "#CD7F32";
            $rank = "Bronze";
        }
//        }

        return view('profile_page')
            ->with('status', $users[0]->status)
            ->with('member_since', $member_since)
            ->with('name', $users[0]->name)
            ->with('occupation', $user_details[0]->occupation)
            ->with('total_votes', $total_votes)
            ->with('comments_made', $total_comments_made)
            ->with('vote_per_month', $v_str)
            ->with('rank_value', $rank_value)
            ->with('rank_color', $color)
            ->with('rank_badge', $rank)
            ->with('comments_per_month', $c_str);
    }

}
