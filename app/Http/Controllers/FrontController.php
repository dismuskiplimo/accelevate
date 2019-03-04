<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Event};

class FrontController extends Controller
{
    public function index(){
    	$events = Event::orderBy('created_at', 'DESC')->get();

	    return view('pages.index', [
	    	'title'		=> 'Home',
	    	'events'	=> $events,
	    	'route'		=> 'home',
	    ]);
    }

    public function getEvents(){
    	$events = Event::orderBy('created_at', 'DESC')->get();

	    return view('pages.events', [
	    	'title'		=> 'Events',
	    	'events'	=> $events,
	    	'route'		=> 'events',
	    ]);
    }

    public function getEvent($id){
    	$event = Event::findOrFail($id);

	    return view('pages.event', [
	    	'title'		=> $event->name,
	    	'event'		=> $event,
	    	'route'		=> 'event',
	    ]);
    }

    public function postContactUs(Request $request){
    	$title = config('app.name') . " | Contact Us Email";

        try{
            \Mail::send('emails.contact-us', ['title' => $title, 'request' => $request], function ($message) use($title){
                $message->subject($title);
                $message->to(env('APP_EMAIL'));
            });

        }catch(\Exception $e){
            // session()->flash('error', $e->getMessage());
        }

    	return redirect()->back();
    }

    public function getPrivacyPolicy(){
    	
	    return view('pages.privacy-policy', [
	    	'title'		=> 'Privacy Policy',
	    	'route'		=> 'privacy-policy',
	    ]);
    }

    public function getTermsOfUse(){
    	
	    return view('pages.terms-of-use', [
	    	'title'		=> 'Terms Of Use',
	    	'route'		=> 'terms-of-use',
	    ]);
    }
}
