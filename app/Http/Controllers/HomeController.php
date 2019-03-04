<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Membership, Education, WorkExperience, Skill, Award, Hobby, Achievement};

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function addMembership(Request $request){
        
        $this->validate($request, [
            'name'  => 'max:191|required',
        ]);

        $membership = new Membership;
        $membership->name = $request->name;
        $membership->user_id = auth()->user()->id;
        $membership->save();

        $message = 'Membership Added';
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateMembership(Request $request, $id){
        $membership = Membership::findOrFail($id);

        $user = auth()->user();

        if($membership->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $this->validate($request, [
            'name'  => 'required|max:191',
        ]);

        $membership->name = $request->name;
        $membership->update();

        session()->flash('success', 'Membership Updated');

        return redirect()->back();
    }

    public function deleteMembership(Request $request, $id){
        $membership = Membership::findOrFail($id);

        $user = auth()->user();

        if($membership->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $membership->delete();

        session()->flash('success', 'Membership Deleted');

        return redirect()->back();
    }


    public function addAward(Request $request){
        
        $this->validate($request, [
            'name'  => 'max:191|required',
            'year'  => 'min:1900|max:' . date('Y') . '|required|numeric',
        ]);

        $award = new Award;
        $award->name = $request->name;
        $award->year = $request->year;
        $award->user_id = auth()->user()->id;
        $award->save();

        $message = 'Award Added';
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateAward(Request $request, $id){
        $award = Award::findOrFail($id);

        $user = auth()->user();

        if($award->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $this->validate($request, [
            'name'  => 'required|max:191',
            'year'  => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        $award->name = $request->name;
        $award->year = $request->year;
        $award->update();

        session()->flash('success', 'Award Updated');

        return redirect()->back();
    }

    public function deleteAward(Request $request, $id){
        $award = Award::findOrFail($id);

        $user = auth()->user();

        if($award->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $award->delete();

        session()->flash('success', 'Award Deleted');

        return redirect()->back();
    }


    public function addHobby(Request $request){
        
        $this->validate($request, [
            'name'  => 'max:191|required',
        ]);

        $hobby = new Hobby;
        $hobby->name = $request->name;
        $hobby->user_id = auth()->user()->id;
        $hobby->save();

        $message = 'Hobby Added';
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateHobby(Request $request, $id){
        $hobby = Hobby::findOrFail($id);

        $user = auth()->user();

        if($hobby->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $this->validate($request, [
            'name'  => 'required|max:191',
        ]);

        $hobby->name = $request->name;
        $hobby->update();

        session()->flash('success', 'Hobby Updated');

        return redirect()->back();
    }

    public function deleteHobby(Request $request, $id){
        $hobby = Hobby::findOrFail($id);

        $user = auth()->user();

        if($hobby->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $hobby->delete();

        session()->flash('success', 'Hobby Deleted');

        return redirect()->back();
    }



    public function addAchievement(Request $request){
        
        $this->validate($request, [
            'name'  => 'max:191|required',
        ]);

        $achievement = new Achievement;
        $achievement->name = $request->name;
        $achievement->user_id = auth()->user()->id;
        $achievement->save();

        $message = 'Achievement Added';
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateAchievement(Request $request, $id){
        $achievement = Achievement::findOrFail($id);

        $user = auth()->user();

        if($achievement->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $this->validate($request, [
            'name'  => 'required|max:191',
        ]);

        $achievement->name = $request->name;
        $achievement->update();

        session()->flash('success', 'Achievement Updated');

        return redirect()->back();
    }

    public function deleteAchievement(Request $request, $id){
        $achievement = Achievement::findOrFail($id);

        $user = auth()->user();

        if($achievement->user_id != $user->id){
            session()->flash('error', 'Forbidden');

            return redirect()->back();
        }

        $achievement->delete();

        session()->flash('success', 'Achievement Deleted');

        return redirect()->back();
    }



    public function addWorkExperience(Request $request){
        $this->validate($request,[
            'from'              => 'required|max:191',
            'to'                => 'required|max:191',
            'company'           => 'required|max:191',
            'position'          => 'required|max:191',
        ]);

        $work_experience = new WorkExperience;

        $work_experience->from_date      = $request->from;
        $work_experience->to_date        = $request->to;
        $work_experience->company   = $request->company;
        $work_experience->position  = $request->position;
        $work_experience->user_id   = auth()->user()->id;

        $work_experience->save();

        $message = "Work Experience added";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateWorkExperience(Request $request, $id){
        $this->validate($request,[
            'from'              => 'required|max:191',
            'to'                => 'required|max:191',
            'company'           => 'required|max:191',
            'position'          => 'required|max:191',
        ]);

        $work_experience = WorkExperience::findOrFail($id);

        if($work_experience->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $work_experience->from_date      = $request->from;
        $work_experience->to_date        = $request->to;
        $work_experience->company   = $request->company;
        $work_experience->position  = $request->position;

        $work_experience->update();

        $message = "Work Experience Updated";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function deleteWorkExperience(Request $request, $id){
    
        $work_experience = WorkExperience::findOrFail($id);

        if($work_experience->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $work_experience->delete();

        $message = "Work Experience Removed";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }



    public function addSkill(Request $request){
        $this->validate($request,[
            'skill' => 'required|max:191',
        ]);

        $skill = new Skill;

        $skill->skill   = $request->skill;
        $skill->user_id = auth()->user()->id;

        $skill->save();

        $message = "Skill added";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateSkill(Request $request, $id){
        $this->validate($request,[
            'skill' => 'required|max:191',
        ]);

        $skill = Skill::findOrFail($id);

        if($skill->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $skill->skill = $request->skill;

        $skill->update();

        $message = "Skill Updated";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function deleteSkill(Request $request, $id){
    
        $skill = Skill::findOrFail($id);

        if($skill->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $skill->delete();

        $message = "Skill Removed";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    

    public function addEducation(Request $request){
        $this->validate($request,[
            'school'            => 'required|max:191',
            'level'             => 'required|max:191',
            'field_of_study'    => 'required|max:191',
            'grade'             => 'max:191',
            'start_year'        => 'required|max:191',
            'end_year'          => 'required|max:191',
        ]);

        $education = new Education;

        $education->school = $request->school;
        $education->level = $request->level;
        $education->field_of_study = $request->field_of_study;
        $education->grade = $request->grade;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->user_id = auth()->user()->id;

        $education->save();

        $message = "Education added";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateEducation(Request $request, $id){
        $this->validate($request,[
            'school'            => 'required|max:191',
            'level'             => 'required|max:191',
            'field_of_study'    => 'required|max:191',
            'grade'             => 'max:191',
            'start_year'        => 'required|max:191',
            'end_year'          => 'required|max:191',
        ]);

        $education = Education::findOrFail($id);

        if($education->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $education->school = $request->school;
        $education->level = $request->level;
        $education->field_of_study = $request->field_of_study;
        $education->grade = $request->grade;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->user_id = auth()->user()->id;

        $education->update();

        $message = "Education Updated";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function deleteEducation(Request $request, $id){
    
        $education = Education::findOrFail($id);

        if($education->user_id != auth()->user()->id){
            $message = "Forbidden";
        
            if($request->ajax()){
                $response = ['status' => 403, 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $education->delete();

        $message = "Education Removed";
        
        if($request->ajax()){
            $response = ['status' => 200, 'message' => $message];
            return response()->json($response);
        }

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function updateAboutMe(Request $request){
        $this->validate($request, [
            'about_me' => 'required|max:800',
        ]);

        $user               = auth()->user();
        $user->about_me     = $request->about_me;
        $user->update();

        session()->flash('success', 'Details updated');

        return redirect()->back();
    }

    public function getAboutMe(){
        $me = true;

        $user = auth()->user();

        return view('pages.student.about',[
            'title'           => $user->name . ' | About ',
            'nav'             => 'user-about',
            'user'            => $user,
            'me'              => $me,
        ]);
    }
}
