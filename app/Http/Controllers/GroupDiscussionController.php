<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{GroupDiscussion, GroupDiscussionComment, Group};

use Carbon\Carbon;

class GroupDiscussionController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->initialize();
    }

    public function postDiscussion(Request $request, $id){
    	$this->validate($request, [
    		'content' => 'required',
    	]);

    	$group = Group::findOrFail($id);

    	$user = auth()->user();

    	$discussion 			= new GroupDiscussion;
    	$discussion->group_id 	= $group->id;
    	$discussion->user_id 	= $user->id;
    	$discussion->content 	= $request->content;
    	$discussion->save();

    	session()->flash('success', 'Posted');

    	return redirect()->back();
    }

    public function postDiscussionComment(Request $request, $id){
    	$this->validate($request, [
    		'content' => 'required',
    	]);

    	$discussion = GroupDiscussion::findOrFail($id);

    	$user = auth()->user();

    	$comment 						= new GroupDiscussionComment;
    	$comment->group_discussion_id 	= $discussion->id;
    	$comment->user_id 				= $user->id;
    	$comment->content 				= $request->content;
    	$comment->save();

    	session()->flash('success', 'Comment Posted');

    	return redirect()->back();
    }
}
