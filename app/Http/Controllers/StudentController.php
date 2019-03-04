<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{School, Project, Answer, Attachment, Event, Group, GroupMember, GroupAssignment, GroupAssignmentAnswer, User};

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->middleware('student');

    	$this->initialize();
    }

    public function index(){
    	$user = auth()->user();

    	$projects = $user->school->projects()->orderBy('created_at', 'DESC')->paginate(20);

    	return view('pages.student.index', [
    		'projects' => $projects,
    	]);
    }

    public function getProject($slug){
    	$project = Project::where('slug', $slug)->first();
    	$user = auth()->user();

    	$answer = $project->answers()->where('user_id', $user->id)->first();

    	if(!$project){
    		session()->flash('error', 'Project not found');

    		return redirect()->back();
    	}

    	return view('pages.student.project',[
    		'project' 	=> $project,
    		'answer'	=> $answer,
    	]);


    }

    public function getGroups(){
        
        $user = auth()->user();

        $groups = $user->student_groups()->orderBy('created_at', 'DESC')->get();

        return view('pages.student.groups',[
            'groups'   => $groups,
        ]);


    }

    public function showGroupAssignments($id){
        $user           = auth()->user();

        $group          = Group::findOrFail($id);

        $assignments    = $group->assignments()->orderBy('created_at', 'DESC')->get();

        return view('pages.student.group-assignments', [
            'group'         => $group,
            'assignments'   => $assignments,
        ]);
    }

    public function getGroupDiscussion($id){
        $group = Group::findOrFail($id);

        $discussions = $group->discussions()->orderBy('created_at', 'DESC')->paginate(20);

        return view('pages.student.group-discussions', [
            'group'         => $group,
            'discussions'   => $discussions,
        ]);
    }

    public function showGroupAssignmentAnswers($id, $assignment_id){
        $user           = auth()->user();

        $group          = Group::findOrFail($id);
        $assignment     = GroupAssignment::findOrFail($assignment_id);
        $answers        = $assignment->answers()->orderBy('created_at', 'DESC')->get();

        $answered       = false;

        $answered       = GroupAssignmentAnswer::where('group_assignment_id', $assignment->id)->where('user_id', $user->id)->first();

        return view('pages.student.group-assignment-answers', [
            'group'         => $group,
            'assignment'    => $assignment,
            'answers'       => $answers,
            'answered'      => $answered,
        ]);
    }

    public function postGroupAssignmentAnswer(Request $request, $id, $assignment_id){
        $this->validate($request, [
            'answer' => 'required',
        ]);

        $user           = auth()->user();

        $assignment     = GroupAssignment::findOrFail($assignment_id);

        $answered       = GroupAssignmentAnswer::where('group_assignment_id', $assignment->id)->where('user_id', $user->id)->first();


        if($answered){
            session()->flash('status', 'You alseady answered');

            return redirect()->back();
        }


        $answer                         = new GroupAssignmentAnswer;
        $answer->user_id                = $user->id;
        $answer->group_assignment_id    = $assignment->id;
        $answer->answer                 = $request->answer;
        $answer->save();

        session('status', 'Answer Posted');

        return redirect()->back();
    }

    public function postAnswer(Request $request, $slug){
    	$this->validate($request, [
    		'answer' => 'required',
    	]);

    	$user = auth()->user();

    	$project = Project::where('slug', $slug)->first();

    	$answer = $project->answers()->where('user_id', $user->id)->first();

    	if($answer){
    		session()->flash('status', 'You alseady answered');

    		return redirect()->back();
    	}

    	if(!$project){
    		session()->flash('error', 'Project not found');

    		return redirect()->back();
    	}

    	$answer = new Answer;

    	$answer->user_id 	= $user->id;
    	$answer->project_id = $project->id;
    	$answer->answer 	= $request->answer;
    	$answer->save();

    	if($request->hasFile('attachment')){
    		$file = $request->file('attachment');

    		try{
				$filename 	= $file->getClientOriginalName();
	    		$extension 	= $file->getClientOriginalExtension();

	    		$filepath 	= str_slug(pathinfo($filename, PATHINFO_FILENAME)) . time() . rand(1,10000) . '.' . $extension;

	    		$file->move($this->storage_path , $filepath);

	    		$attachment = new Attachment;
	    		$attachment->filename 	= $filename;
	    		$attachment->extension 	= $extension;
	    		$attachment->user_id 	= $user->id;
	    		$attachment->answer_id 	= $answer->id;
	    		$attachment->filepath 	= $filepath;
	    		$attachment->save();
    		}catch(\Exception $e){
    			session()->flash('error', $e->getMessage());
    		}

    	}

    	session('status', 'Answer Posted');

    	return redirect()->back();
    }

    public function getProfile(){
    	$user = auth()->user();

    	if(!$user){
    		session()->flash('error', 'User not found');

    		return redirect()->back();
    	}


    	return view('pages.student.profile',[
    		'user' => $user,
    	]);


    }

    public function getUser($id){
        $user = User::find($id);

        $me = false;

        if($user->id == auth()->user()->id){
            $me = true;
        }

        if(!$user){
            session()->flash('error', 'User not found');

            return redirect()->back();
        }


        return view('pages.student.user',[
            'user'  => $user,
            'me'    => $me,
        ]);


    }
}
