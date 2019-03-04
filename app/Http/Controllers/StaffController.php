<?php

namespace App\Http\Controllers;

use App\{School, Project, Answer, Attachment, User, Review, Event, Group, GroupMember, GroupAssignment, GroupAssignmentAnswer};



use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->middleware('staff');

    	$this->initialize();
    }

    public function index(){
    	$user = auth()->user();
    	
    	$schools = School::orderBy('name', 'ASC')->get();

    	$projects = $user->projects;
    	
    	return view('pages.staff.index', [
    		'schools' => $schools,
    		'projects' => $projects,
    	]);
    }

    public function postProject(Request $request){
    	$this->validate($request,[
    		'question' => 'required|max:191',
    		'school_id' => 'required|numeric',
    	]);

    	$project = new Project;

    	$project->question 	= $request->question;
    	$project->slug 		= str_slug($request->question);
    	$project->school_id = $request->school_id;
    	$project->user_id 	= auth()->user()->id;
    	$project->save();

    	session()->flash('success', 'Project Posted');

    	return redirect()->back();
    }

    public function getGroups(){
        $user = auth()->user();

        $groups = $user->groups()->orderBy('created_at', 'DESC')->get();

        return view('pages.staff.groups', [
            'groups' => $groups,
        ]);
    }

    public function getGroupDiscussion($id){
        $group = Group::findOrFail($id);

        $discussions = $group->discussions()->orderBy('created_at', 'DESC')->paginate(20);

        return view('pages.staff.group-discussions', [
            'group'         => $group,
            'discussions'   => $discussions,
        ]);
    }

    public function showGroupMembers($id){
        $user = auth()->user();

        $group = Group::findOrFail($id);

        $members = $group->members()->orderBy('created_at', 'DESC')->get();

        $ids = [];

        foreach ($members as $member) {
            $ids[] = $member->student_id;
        }

        $students = User::where('usertype', 'STUDENT')->orderBy('name', 'DESC')->get();

        return view('pages.staff.group-members', [
            'members'   => $members,
            'group'     => $group,
            'students'  => $students,
            'ids'       => $ids,
        ]);
    }

    public function showGroupAssignments($id){
        $user           = auth()->user();

        $group          = Group::findOrFail($id);

        $assignments    = $group->assignments()->orderBy('created_at', 'DESC')->get();

        return view('pages.staff.group-assignments', [
            'group'         => $group,
            'assignments'   => $assignments,
        ]);
    }

    public function showGroupAssignmentAnswers($id, $assignment_id){
        $user           = auth()->user();

        $group          = Group::findOrFail($id);
        $assignment     = GroupAssignment::findOrFail($assignment_id);
        $answers        = $assignment->answers()->orderBy('created_at', 'DESC')->get();


        return view('pages.staff.group-assignment-answers', [
            'group'         => $group,
            'assignment'    => $assignment,
            'answers'       => $answers,
        ]);
    }

    public function markProjectAnswer(Request $request, $id){
        $this->validate($request, [
            'marks' => 'numeric|max:' . config('app.total_marks'),
        ]);

        $answer = Answer::findOrFail($id);
        $answer->marks = $request->marks;
        $answer->update();

        return redirect()->back();


    }

    public function markGroupAnswer(Request $request, $id){
        $this->validate($request, [
            'marks' => 'numeric|max:' . config('app.total_marks'),
        ]);

        $answer = GroupAssignmentAnswer::findOrFail($id);
        $answer->marks = $request->marks;
        $answer->update();

        return redirect()->back();


    }

    public function postGroupAssignment(Request $request, $id){
        $this->validate($request,[
            'question' => 'required|max:191',
        ]);

        $group = Group::findOrFail($id);
        $group_assignment               = new GroupAssignment;
        $group_assignment->question     = $request->question;
        $group_assignment->slug         = str_slug($request->question);
        $group_assignment->group_id     = $group->id;
        $group_assignment->user_id      = auth()->user()->id;
        $group_assignment->save();

        session()->flash('success', 'Assignment Posted');

        return redirect()->back();
    }

    public function postGroup(Request $request){
        $this->validate($request,[
            'name' => 'required|max:191',
        ]);

        $group = new Group;

        $group->name = $request->name;
        $group->user_id   = auth()->user()->id;
        $group->save();

        session()->flash('success', 'Group Created');

        return redirect()->back();
    }

    public function postGroupMember(Request $request, $id){
        $this->validate($request,[
            'student_id' => 'required|numeric',
        ]);

        $group = Group::findOrFail($id);

        $user = auth()->user();

        if($user->id != $group->user_id){
            session()->flash('error', 'Forbidden');
        }

        $group_member               = new GroupMember;
        $group_member->student_id   = $request->student_id;
        $group_member->group_id     = $group->id;
        $group_member->staff_id     = $user->id;
        $group_member->save();

        session()->flash('success', 'Student Added to Group');

        return redirect()->back();
    }

    public function getProject($slug){
    	$project = Project::where('slug', $slug)->first();

    	if(!$project){
    		session()->flash('error', 'Project not found');

    		return redirect()->back();
    	}


    	return view('pages.staff.project',[
    		'project' => $project,
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


    	return view('pages.staff.user',[
    		'user'  => $user,
            'me'    => $me,
    	]);


    }
}
