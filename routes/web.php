<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index')->name('homepage');

Route::get('/events', 'FrontController@getEvents')->name('front.events');

Route::get('/events/{id}/view', 'FrontController@getEvent')->name('front.event');

Route::post('/contact-us', 'FrontController@postContactUs')->name('front.contact-us');

Route::get('/terms-and-conditions', 'FrontController@getTermsAndConditions')->name('front.terms-and-conditions');

Route::get('/privacy-policy', 'FrontController@getPrivacyPolicy')->name('front.privacy-policy');

Route::get('/terms-of-use', 'FrontController@getTermsOfUse')->name('front.terms-of-use');

Route::post('/user/{id}/review', 'BackController@postReview')->name('user.review');

Route::get('/logout', function () {
    if(auth()->check()){
    	auth()->logout();
    }

    return redirect()->route('login');
});

Auth::routes();

Route::get('/dashboard', 'BackController@index')->name('dashboard');

Route::get('/file/{id}/download', 'BackController@download')->name('download');

Route::get('/user/profile', 'BackController@showUserProfile')->name('user-profile');
Route::post('/profile/image/update', 'BackController@updateUserImage')->name('update-image');
Route::post('/profile/cover/update', 'BackController@updateUserCover')->name('update-cover');
Route::post('/profile/info/update', 'BackController@updateUserProfile')->name('update-profile');
Route::post('/profile/password/update', 'BackController@updateUserPassword')->name('update-password');

Route::post('/groups/{id}/discussion/post', 'GroupDiscussionController@postDiscussion')->name('discussion.post');
Route::post('/groups/discussion/{id}/comment', 'GroupDiscussionController@postDiscussionComment')->name('comment.post');

Route::group(['prefix' => 'staff'], function(){
	Route::get('/', 'StaffController@index')->name('dashboard.staff');
	Route::post('/', 'StaffController@postProject');

	Route::get('/project/{slug}/view', 'StaffController@getProject')->name('staff.project');

	Route::post('/project/answer/{id}/mark', 'StaffController@markProjectAnswer')->name('staff.project.answer.mark');

	Route::post('/group/answer/{id}/mark', 'StaffController@markGroupAnswer')->name('staff.group.answer.mark');
	
	Route::get('/groups', 'StaffController@getGroups')->name('staff.groups');

	Route::post('/groups/create', 'StaffController@postGroup')->name('staff.group.create');
	Route::get('/groups/{id}/members', 'StaffController@showGroupMembers')->name('staff.group-members');
	Route::get('/groups/{id}/assignments', 'StaffController@showGroupAssignments')->name('staff.group-assignments');
	Route::get('/groups/{id}/assignments/{assignment_id}/answers', 'StaffController@showGroupAssignmentAnswers')->name('staff.group-assignment.answers');
	Route::post('/groups/{id}/assignments/create', 'StaffController@postGroupAssignment')->name('staff.group-assignment.create');
	Route::post('/groups/{id}/members/add', 'StaffController@postGroupMember')->name('staff.group-member.add');
	
	Route::get('/user/{id}/view', 'StaffController@getUser')->name('staff.user');
	Route::get('/project/{slug}/answer/{id}', 'StaffController@getAnswer')->name('staff.answer');

	Route::get('/groups/{id}/discussion', 'StaffController@getGroupDiscussion')->name('staff.group.discussion');
});

Route::group(['prefix' => 'student'], function(){
	Route::get('/', 'StudentController@index')->name('dashboard.student');

	Route::get('/project/{slug}/view', 'StudentController@getProject')->name('student.project');
	Route::post('/project/{slug}/view', 'StudentController@postAnswer');
	Route::get('/profile', 'StudentController@getProfile')->name('student.profile');

	Route::get('/groups', 'StudentController@getGroups')->name('student.groups');

	Route::get('/groups/{id}/assignments', 'StudentController@showGroupAssignments')->name('student.group-assignments');
	Route::get('/groups/{id}/assignments/{assignment_id}/answers', 'StudentController@showGroupAssignmentAnswers')->name('student.group-assignment.answers');
	Route::post('/groups/{id}/assignments/{assignment_id}/answers', 'StudentController@postGroupAssignmentAnswer');

	Route::get('/groups/{id}/discussion', 'StudentController@getGroupDiscussion')->name('student.group.discussion');

	Route::get('/user/{id}/view', 'StudentController@getUser')->name('student.user');
});

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('dashboard.admin');
	Route::post('/events/create', 'AdminController@postEvent')->name('admin.event.create');
	Route::post('/events/{id}/delete', 'AdminController@deleteEvent')->name('admin.event.delete');
});

Route::post('/profile/memberships/add', 'HomeController@addMembership')->name('user.membership.add');
Route::post('/profile/memberships/{id}/update', 'HomeController@updateMembership')->name('user.membership.update');
Route::post('/profile/memberships/{id}/delete', 'HomeController@deleteMembership')->name('user.membership.delete');

Route::post('/profile/education/add', 'HomeController@addEducation')->name('user.education.add');
Route::post('/profile/education/{id}/update', 'HomeController@updateEducation')->name('user.education.update');
Route::post('/profile/education/{id}/delete', 'HomeController@deleteEducation')->name('user.education.delete');

Route::post('/profile/work-experiences/add', 'HomeController@addWorkExperience')->name('user.work-experience.add');
Route::post('/profile/work-experiences/{id}/update', 'HomeController@updateWorkExperience')->name('user.work-experience.update');
Route::post('/profile/work-experiences/{id}/delete', 'HomeController@deleteWorkExperience')->name('user.work-experience.delete');

Route::post('/profile/skills/add', 'HomeController@addSkill')->name('user.skill.add');
Route::post('/profile/skills/{id}/update', 'HomeController@updateSkill')->name('user.skill.update');
Route::post('/profile/skills/{id}/delete', 'HomeController@deleteSkill')->name('user.skill.delete');

Route::post('/profile/awards/add', 'HomeController@addAward')->name('user.award.add');
Route::post('/profile/awards/{id}/update', 'HomeController@updateAward')->name('user.award.update');
Route::post('/profile/awards/{id}/delete', 'HomeController@deleteAward')->name('user.award.delete');

Route::post('/profile/hobbies/add', 'HomeController@addHobby')->name('user.hobby.add');
Route::post('/profile/hobbies/{id}/update', 'HomeController@updateHobby')->name('user.hobby.update');
Route::post('/profile/hobbies/{id}/delete', 'HomeController@deleteHobby')->name('user.hobby.delete');

Route::post('/profile/achievments/add', 'HomeController@addAchievement')->name('user.achievment.add');
Route::post('/profile/achievments/{id}/update', 'HomeController@updateAchievement')->name('user.achievment.update');
Route::post('/profile/achievments/{id}/delete', 'HomeController@deleteAchievement')->name('user.achievment.delete');

Route::post('/profile/about-me/update', 'HomeController@updateAboutMe')->name('user.about-me.update');

Route::get('/profile/about', 'HomeController@getAboutMe')->name('user.profile.about');
