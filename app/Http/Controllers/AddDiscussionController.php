<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddDiscussionController extends Controller
{

    public function index()
    {
        @$id = auth()->user()->id;

        //update user active time
        $affected = DB::table('users')
            ->where('id', $id)
            ->update(['updated_at' => now()]);
        $status = DB::table('users')->where('id', $id)->value('status');

        $listFiledValues = DB::table('tags_tables')->select('tag')->get();


        return view('add_disscussion')->with('status', $status)->with('tags_list', $listFiledValues);;
    }

    public function create(Request $request)
    {
        @$user_id = auth()->user()->id;
        $content = $request->input('editor');
        $title = $request->input('title');
        $tags = $request->input('tags');
        $issafe = 1;
        $listWords = DB::table('profanity')->select('word')->get();

        for ($i = 0; $i < sizeof($listWords); $i++) {
            if (strpos($content, $listWords[$i]->word) || strpos($title, $listWords[$i]->word) || strpos($tags, $listWords[$i]->word)) {
                $issafe = 0;
                break;
            }
        }

        $id = DB::table('posts')->insertGetId([
            'posted_by_user_id' => $user_id,
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'is_safe' => $issafe,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $tt = DB::table('follow_discussions_tables')->insert([
            'post_id' => $id,
            'user_id' => $user_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return  $id;
    }

    function showDiscussionMainPage($id)
    {
        @$uid = auth()->user()->id;
        $logged_in_id = $uid;
        //update user active time
        $affected = DB::table('users')
            ->where('id', $uid)
            ->update(['updated_at' => now()]);
        $status = DB::table('users')->where('id', $uid)->value('status');


        $discussion_query = DB::table('posts')->select(
            'id',
            'posted_by_user_id',
            'title',
            'content',
            'vote_num',
            'is_safe',
            'status',
            'created_at',
            'updated_at',
            'tags'
        )->where('id', '=', $id)->get();

        $data = DB::table('comments')->orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('post_id', '=', $discussion_query[0]->id)
            ->simplePaginate(3);

        return view('discussion_main_page', compact('discussion_query', 'status', 'logged_in_id', 'data'));
    }

    public function editDiscussionMainPage($id)
    {
        @$uid = auth()->user()->id;
        $logged_in_id = $uid;
        //update user active time
        $affected = DB::table('users')
            ->where('id', $uid)
            ->update(['updated_at' => now()]);
        $status = DB::table('users')->where('id', $uid)->value('status');


        $discussion_query = DB::table('posts')->select(
            'id',
            'posted_by_user_id',
            'title',
            'content',
            'vote_num',
            'is_safe',
            'status',
            'created_at',
            'updated_at',
            'tags'
        )->where('id', '=', $id)->get();
        $tagslist = explode(',', $discussion_query[0]->tags);
        $tags_list = DB::table('tags_tables')->select('tag')->get()->toArray();
        $tagzz = array();
        foreach ($tags_list as $tt) {
            array_push($tagzz, $tt->tag);
        }
        $atags_list = array_diff($tagzz, $tagslist);
        return view('edit_discussion', compact('discussion_query', 'status', 'logged_in_id', 'tagslist', 'atags_list'));
    }

    public function edit_discussion_post(Request $request)
    {
        $tags_from_user = $request->tags;
        $post_id_from_user = $request->result;
        $editor_from_users = $request->editor;
        @$user_id = auth()->user()->id;
        //select post with post id
        $posts = DB::table('posts')->where('id', $post_id_from_user)->get()->toArray();

        //insert post in log table
        DB::table('posts_logs')->insert([
            'posted_by_user_id' => $user_id,
            'original_post_id' => $posts[0]->id,
            'title' => $posts[0]->title,
            'content' => $posts[0]->content,
            'tags' => $posts[0]->tags,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //update in post
        $posts = DB::table('posts')
            ->where('id', $post_id_from_user)
            ->update([
                'content' => $editor_from_users,
                'tags' => $tags_from_user,
                'updated_at' => now(),
            ]);

        return 1;
    }

    public function delete_discussion_post(Request $request)
    {

        $post_id_from_user = $request->result;

        $posts = DB::table('posts')
            ->where('id', $post_id_from_user)
            ->update([
                'status' => '0',
                'updated_at' => now(),
            ]);

        return 1;
    }
    public function delete_comment(Request $request)
    {

        $comment_id_from_user = $request->result;


        $deleted = DB::table('comments')
            ->where('id', '=', $comment_id_from_user)

            ->delete();
        return 1;
    }
    public function add_comment(Request $request)
    {
        @$user_id = auth()->user()->id;
        $post_id = $request->post_id;
        $comment_txt = $request->comment_txt;
        $posted_by = $request->posted_by;

        DB::table('comments')->insert([
            'post_id' => $post_id,
            'user_id' => $user_id,
            'comment_text' => $comment_txt,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //php artisan make:migration add_notification_from_which_user_to_users --table="notifications_tables"
        DB::table('notifications_tables')->insert([
            'notification_text' => "",
            'notification_to_which_user' => $posted_by,
            'notification_from_which_user' => $user_id,
            'post_id' => $post_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return 1;
    }

    function fetch_comment(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('comments')->orderBy('id', 'desc')
                ->where('status', '=', '1')
                ->where('post_id', '=', $request->post_id)
                ->simplePaginate(3);
            return view('load_comments', compact('data'))->render();
        }
    }

    public function load_data_auto_comment(Request $request)
    {
        $data = DB::table('comments')->orderBy('id', 'desc')
            ->where('status', '=', '1')
            ->where('post_id', '=', $request->post_id)
            ->simplePaginate(3);
        return view('load_comments', compact('data'))->render();
    }
}
