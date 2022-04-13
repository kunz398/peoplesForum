<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function load_notification()
    {
        @$id = auth()->user()->id;
        $follow_tables = DB::table('follow_discussions_tables')
            ->select('post_id')
            ->where('user_id', '=', $id)
            ->get()->toArray();

        $notfication_list = array();
        foreach ($follow_tables as $follow_table) {
            $notifications_tables = DB::table('notifications_tables')
                ->select('*')
                ->where('notification_to_which_user', '=', $id)
                ->where('is_read', '=', '0')
                ->where('post_id', '=', $follow_table->post_id)
                ->get()->toArray();
//            dd($notifications_tables);

            foreach ($notifications_tables as $notifications_table) {
               $post_title =  self::getPostTitle($follow_table->post_id);
                $FromWhome = $notifications_table->notification_from_which_user;
                $from_user = HomeController::get_username($notifications_table->notification_from_which_user);
                array_push($notfication_list, "You have a new Comment from $from_user - $post_title|$follow_table->post_id|$FromWhome");
            }
        }

        return response()->json(["notfication_list" => $notfication_list]);
    }

    public function make_noti_read(Request $request)
    {
        $post_id = $request->noti_link_href;
        $from_user = $request->from_user;
        @$id = auth()->user()->id;
        $affected = DB::table('notifications_tables')
            ->where('notification_to_which_user', $id)
            ->where('post_id', $post_id)
            ->where('notification_from_which_user', $from_user)
            ->update([
                'updated_at' => now(),
                'is_read' => '1'
            ]);
        return 1;
    }

    public function search_search(Request $request)
    {
        $search_text = $request->search_text;
        $search_results = DB::select("SELECT * FROM `posts` WHERE posts.content LIKE '%$search_text%' OR posts.title LIKE '%$search_text%' OR posts.tags LIKE '%$search_text%'");
        $results = "";

        foreach ($search_results as $search_result) {
            $results .= " <a class='search_result_link' href='/discussion/$search_result->id'><span class='mdi mdi-magnify mdi-18px'> " . $search_result->title . "</a> <br /><br />";
        }
        return $results;
    }

    public function getPostTitle($pid){
         $p_title = DB::table('posts')->where('id', $pid)->value('title');
         return $p_title;
    }
}
