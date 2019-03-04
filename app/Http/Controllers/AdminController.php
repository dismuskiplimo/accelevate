<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{School, Project, Answer, Attachment, Event, Group, GroupMember};

use Image;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('admin');
    	$this->initialize();
    }

    public function index(){
    	$events = Event::orderBy('created_at', 'DESC')->get();

    	return view('pages.admin.index', [
    		'events'	=> $events,
    	]);
    }

    public function postEvent(Request $request){
    	$this->validate($request, [
    		'name'				=> 'required|max:191',
    		'location'			=> 'required|max:191',
    		'date'				=> 'required',
    		'description'		=> 'max:800',
    	]);

    	$image = null;


        if($request->hasFile('image') && $request->file('image')->isValid()){
            try{
                $this->validate($request,[
                    'image' => 'mimes:jpg,jpeg,png,bmp|min:0.001|max:40960',
                ]);
            }catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
            }

            

            try{
                $file       = $request->file('image');

                $image  = rand(1,10000) . '.' . $file->getClientOriginalExtension();
                
               
                $image_path     = $this->image_path . '/' .'events'. '/' . $image;
            
                Image::make($file)->orientate()->fit(1366,650)->save($image_path);

                $image_path     = $this->image_path . '/' .'events/full'. '/' . $image;

                Image::make($file)->orientate()->resize(1366 ,null , function($constraint){
                    $constraint->aspectRatio();
                })->save($image_path);

            } catch(\Exception $e){
                session()->flash('error', 'Image Upload failed. Reason: '. $e->getMessage());
            }
            
        }

        $event 				= new Event;
        $event->name 		= $request->name;
        $event->location 	= $request->location;
        $event->date 		= $request->date;
        $event->description = $request->description;
        $event->image 		= $image;
        $event->save();

    	session()->flash('success', 'Event Posted');

    	return redirect()->back();
    }

    public function deleteEvent(Request $request, $id){
    	$event = Event::findOrFail($id);

    	$event->delete();

    	session()->flash('success', 'Event Deleted');

    	return redirect()->back();
    }
}
