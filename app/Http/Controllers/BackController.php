<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Attachment, User, Review};

use Carbon\Carbon;

use Image,Session, Hash;

class BackController extends Controller
{
	protected $date;

	public function __construct(){
		$this->middleware('auth');
		$this->date = Carbon::now();

		$this->initialize();
	}

    public function index(){
    	$user = auth()->user();

    	if($user->is_admin()){
    		return redirect()->route('dashboard.admin');
    	}

    	if($user->is_student()){
    		return redirect()->route('dashboard.student');
    	}

    	if($user->is_staff()){
    		return redirect()->route('dashboard.staff');
    	}
    }

    public function download($id){
    	$attachment = Attachment::find($id);

    	if(!$attachment){
    		session()->flash('error', '404 : File not found');
    	}

    	$filepath = $this->storage_path . '\\' . $attachment->filepath; 

    	if(file_exists($filepath)){
			return response()->download($filepath, $attachment->filename);
    	}
    }

     public function postReview(Request $request, $id){
        $this->validate($request,[
            'review' => 'required',
            'rating' => 'required',
        ]);

        $student = User::find($id);

        $user = auth()->user()->id;

        if(!$student){
            session()->flash('error', '404 : Student not found');
            return redirect()->back();
        }

        $review = new Review;

        $review->staff_id       = $user;
        $review->student_id     = $student->id;
        $review->review         = $request->review;
        $review->rating         = $request->rating;
        $review->save();

        session()->flash('success', 'Review Added');

        return redirect()->back();
    }

    public function updateUserProfile(Request $request){
        $this->validate($request, [
            'name'  => 'required|max:191',
            'email' => 'required|email|max:191',
        ]);

        $user = auth()->user();

        $user->name = $request->name;

        if($request->email != $user->email){
            $this->validate($request, [
                'email' => 'unique:users',
            ]);

            $user->email = $request->email;
        }

        $user->update();

        session()->flash('success', 'Profile Updated');

        return redirect()->back();
    }

    public function updateUserImage(Request $request){
        if($request->hasFile('image') && $request->file('image')->isValid()){
            try{
                $this->validate($request,[
                    'image' => 'mimes:jpg,jpeg,png,bmp|min:0.001|max:40960',
                ]);
            }catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
                
                return redirect()->back();
            }

            $user = auth()->user();

            if(!$user){
                $message = 'User not found';
                session()->flash('error', $message);
                return redirect()->back();
            }

            if(!empty($user->thumb_url) && !empty($user->img_url)){
                
                $image_path = $this->image_path . '/' . $user->img_url;
                $thumbnail_path = $this->image_path . '/' . 'thumbnails' . '/' . $user->thumb_url;

                $user->img_url = null;
                $user->thumb_url = null;
       
                @unlink($image_path);
                @unlink($thumbnail_path);
            }

            try{
                $file       = $request->file('image');
                $fileName   = 'image_'. time(). rand(1,10000) . '.' . $file->getClientOriginalExtension();
                $thumbName  = 'thumb_'. time(). rand(1,10000) . '.' . $file->getClientOriginalExtension();
                
                $image_path         = $this->image_path . '/' . $fileName;
                $thumbnail_path     = $this->image_path . '/' .'thumbnails'. '/' . $thumbName;
            
                Image::make($file)->orientate()->fit(450,450)->save($image_path);
                Image::make($file)->orientate()->fit(64,64)->save($thumbnail_path);

                $user->img_url      = $fileName;
                $user->thumb_url    = $thumbName;
                $user->update();

                session()->flash('success', 'Profile Picture Updated');

            } catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
            }
            
        }

        return redirect()->back();
    }

    public function updateUserCover(Request $request){
        if($request->hasFile('image') && $request->file('image')->isValid()){
            try{
                $this->validate($request,[
                    'image' => 'mimes:jpg,jpeg,png,bmp|min:0.001|max:40960',
                ]);
            }catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
                
                return redirect()->back();
            }

            $user = auth()->user();

            if(!$user){
                $message = 'User not found';
                session()->flash('error', $message);
                return redirect()->back();
            }

            if(!empty($user->cover_url)){
                
                $cover_path = $this->image_path . '/' . 'covers' . '/' . $user->cover_url;

                $user->cover_url = null;
       
                @unlink($cover_path);
            }

            try{
                $file       = $request->file('image');

                $coverName  = rand(1,10000) . '.' . $file->getClientOriginalExtension();
                
               
                $cover_path     = $this->image_path . '/' .'covers'. '/' . $coverName;
            
                Image::make($file)->orientate()->fit(1500,400)->save($cover_path);
                

                $user->cover_url    = $coverName;
                $user->update();

                session()->flash('success', 'Cover Updated');

            } catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
            }
            
        }

        return redirect()->back();
    }

    public function updateUserPassword(Request $request){
        $this->validate($request,[
            'old_password' => 'required|max:191',
            'new_password' => 'required|max:191|confirmed',
            'new_password_confirmation' => 'required|max:191',
        ]);

        $user = auth()->user();

        if(Hash::check($request->old_password ,$user->password)){
            $user->password = Hash::make($request->new_password);

            $user->update();

            $message = 'Password Updated';

            if($request->ajax()){
                $response = ['status' => '200', 'message' => $message];
                return response()->json($response);
            }

            session()->flash('success', $message);
        }else{
            $message = 'Old password does not match the password in our database';

            if($request->ajax()){
                $response = ['status' => '403', 'message' => $message];
                return response()->json($response);
            }

            session()->flash('error', $message);          
        }

        return redirect()->back();
    }

    public function showUserProfile(){
        $user = auth()->user();

       


        return view('pages.profile',[
            'user' => $user,
        ]);
    }
}
