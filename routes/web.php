<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogCatController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseYearController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FreeResourceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IgnouTubeController;
use App\Http\Controllers\LearnersController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

/**********************************************************************************
 * ********************************************************************************
 * ***************************** Admin-side ***************************************
 * ********************************************************************************/

Route::get('/login',[AdminController::class,'Login'])->name('login');
Route::post('/do-login',[AdminController::class,'DOLogin'])->name('dologin');

Route::group(['middleware'=>'admin_auth'],function(){
Route::get('/logout',[AdminController::class,'LogOut'])->name('logout');

Route::get('/admin-home',[AdminController::class,'AdminHome'])->name('home');
Route::get('/baner',[BannerController::class,'Banner'])->name('banner');
Route::get('/add-banner',[BannerController::class,'AddBanner'])->name('addbanner');
Route::post('/banner-save',[BannerController::class,'BannerSave'])->name('bannerSave');
Route::get('/banner-destroy/{id}',[BannerController::class,'BannerDestroy'])->name('bannerdestroy');

Route::get('/consultation',[ConsultationController::class,'Consultation'])->name('consultation');
Route::post('/consul-excel',[ConsultationController::class,'ConsultExcel'])->name('consultexcel');

Route::get('/blog-category-list',[BlogCatController::class,'BlogCategoryList'])->name('blogcatlist');
Route::get('/blog-category-add',[BlogCatController::class,'BlogCategoryAdd'])->name('blogcatadd');
Route::post('/blog-category-save',[BlogCatController::class,'BlogCategorySave']);
Route::get('/blog-category-edit/{id}',[BlogCatController::class,'BlogCategoryEdit'])->name('blogcatedit');
Route::post('/blog-category-update',[BlogCatController::class,'BlogCategoryUpdate']);
Route::post('/blog-category-delete',[BlogCatController::class,'BlogCategoryDelete']);

Route::get('/blog-table',[BlogController::class,'Blog'])->name('blog');
Route::get('/add-blog',[BlogController::class,'AddBlog'])->name('addblog');
Route::post('/blog-save',[AjaxController::class,'BlogSave'])->name('blogsave');
Route::get('/blog-edit/{id}',[AjaxController::class,'BlogEdit'])->name('blogedit');
Route::post('/blog-update',[AjaxController::class,'BlogUpdate'])->name('blogupdate');
Route::post('/blog-delete',[AjaxController::class,'BlogDelete']);

Route::get('/dropdownslist',[DropdownController::class,'DropdownList'])->name('dropdownlist');
Route::post('/dropdowns-save',[DropdownController::class,'DropdownSave']);
Route::post('/dropdowns-update',[DropdownController::class,'DropdownUpdate']);
Route::post('/dropdowns-delete',[DropdownController::class,'DropdownDelete']);

Route::get('/learnerslist',[LearnersController::class,'LearbersList'])->name('learnerslist');
Route::post('/learners-update',[LearnersController::class,'LearbersUpdate']);

Route::get('/academics',[AcademicController::class,'Academics'])->name('academics');
Route::get('/add-academics',[AcademicController::class,'addAcademics'])->name('addacademics');
Route::post('/academic-save',[AjaxController::class,'AcademicSave']);
Route::get('/academic-delete/{id}',[AjaxController::class,'AcademicDestroy'])->name('academicdestroy');

Route::get('/departments',[DepartmentController::class,'Departments'])->name('department');
Route::get('/add-departments',[DepartmentController::class,'AddDepartments'])->name('adddepartment');
Route::post('/departments-save',[AjaxController::class,'DepartmentSave']);
Route::get('/departments-edit/{id}',[DepartmentController::class,'DepartmentsEdit'])->name('departmentedit');
Route::post('/departments-update',[AjaxController::class,'DepartmentUpdate']);
Route::get('/departments-destroy/{id}',[DepartmentController::class,'DepartmentDestroy'])->name('departmentdestroy');

Route::get('/course-year-list',[CourseYearController::class,'CourseYearList'])->name('courseyearlist');
Route::get('/course-year-add',[CourseYearController::class,'CourseYearAdd'])->name('courseyearadd');
Route::post('/course-year-save',[CourseYearController::class,'CourseYearSave']);
Route::get('/course-year-edit/{id}',[CourseYearController::class,'CourseYearEdit'])->name('courseyearedit');
Route::post('/course-year-update',[CourseYearController::class,'CourseYearUpdate']);
Route::post('/course-year-delete',[CourseYearController::class,'CourseYearDelete']);

Route::get('/course',[CourseController::class,'Course'])->name('coursetable');
Route::get('/add-course',[CourseController::class,'AddCourse'])->name('addcourse');
Route::post('/course-save',[AjaxController::class,'CourseSave']);

Route::get('/course-edit/{id}',[CourseController::class,'CourseEdit'])->name('courseedit');

Route::post('/course-update',[AjaxController::class,'CourseUpdate']);
Route::get('/course-destroy/{id}',[CourseController::class,'CourseDestroy'])->name('coursedestroy');

Route::get('/comments',[CommentController::class,'Comments'])->name('comments');

Route::get('/faq',[FAQController::class,'FAQ'])->name('faq');
Route::get('/add-faq',[FAQController::class,'AddFAQ'])->name('addfaq');
Route::post('/faq-save',[AjaxController::class,'FAQSave'])->name('faqsave');
Route::get('/faq-edit/{id}',[FAQController::class,'FAQEdit'])->name('faqedit');
Route::post('/faq-update',[FAQController::class,'FAQupdate']);
Route::post('/faq-delete',[FAQController::class,'FAQdelete']);

Route::get('/free-resource',[FreeResourceController::class,'FreeResource'])->name('freeresource');
Route::get('/add-free-resource',[FreeResourceController::class,'AddFreeResource'])->name('addfreeresource');
Route::post('/free-resource-save',[AjaxController::class,'FreeResourceSave']);
Route::post('/free-resource-save-modal',[AjaxController::class,'FreeResourceSaveModal']);
Route::get('/free-resource-edit/{id}',[FreeResourceController::class,'FreeResourceEdit'])->name('freeresourceedit');
Route::post('/free-resource-update',[AjaxController::class,'FreeResourceUpdate']);
Route::post('/free-resource-destroy',[AjaxController::class,'FreeResourceDestroy']);

Route::get('/sub-folders',[FreeResourceController::class,'SubFolders'])->name('subfolders');
Route::get('/sub-folders-sub/{id}',[FreeResourceController::class,'SubFoldersSub'])->name('subfolderssub');
Route::get('/add-sub-folders',[FreeResourceController::class,'ADDSubFolders'])->name('addsubfolders');
Route::post('/sub-folders-save',[AjaxController::class,'SubFoldersSave']);
Route::get('/sub-folders-sub-edit/{id}',[FreeResourceController::class,'SubFoldersSubEdit'])->name('subfolderssubedit');
Route::post('/sub-folders-sub-update',[AjaxController::class,'SubFoldersSubUpdate']);
Route::post('/sub-folders-destroy',[FreeResourceController::class,'SubFoldersDestroy']);

Route::get('/sub-folders-filelist/{id}',[FreeResourceController::class,'SubFoldersFileList'])->name('subfolderfilelist');
Route::post('/sub-folders-file-save',[AjaxController::class,'SubFoldersFileSave']);
Route::get('/sub-folders-file-edit/{id}',[FreeResourceController::class,'SubFoldersFile'])->name('subfoldersfile');
Route::post('/file-update',[AjaxController::class,'SubFoldersFileUpdate']);
Route::post('/file-delete',[AjaxController::class,'SubFoldersFilDelete']);

Route::get('/ignou-playlist',[IgnouTubeController::class,'IgnouPlayList'])->name('ignouplaylist');
Route::post('/ignou-playlist-save',[IgnouTubeController::class,'IgnouPlayListSave']);
Route::post('/ignou-playlist-update',[IgnouTubeController::class,'IgnouPlayListUpdate']);
Route::post('/ignou-playlist-delete',[IgnouTubeController::class,'IgnouPlayListDelete']);

Route::get('/ignoutube-list',[IgnouTubeController::class,'IgnouTubeList'])->name('ignoutubelist');
Route::get('/ignoutube-add',[IgnouTubeController::class,'IgnouTubeAdd'])->name('ignoutubeadd');
Route::post('/ignoutube-save',[IgnouTubeController::class,'IgnouTubesave']);
Route::get('/ignoutube-edit/{id}',[IgnouTubeController::class,'IgnouTubeEdit'])->name('ignoutubeedit');
Route::post('/ignoutube-update',[IgnouTubeController::class,'IgnouTubeUpdate']);
Route::post('/ignoutube-delete',[IgnouTubeController::class,'IgnouTubeDelete']);

Route::get('/whatsapp-list',[WhatsappController::class,'WhatsappList'])->name('whatsapplist');
Route::get('/whatsapp-add',[WhatsappController::class,'WhatsappAdd'])->name('whatsappadd');
Route::post('/whatsapp-save',[WhatsappController::class,'WhatsappSave']);
Route::get('/whatsapp-edit/{id}',[WhatsappController::class,'WhatsappEdit'])->name('whatsappedit');
Route::post('/whatsapp-update',[WhatsappController::class,'WhatsappUpdate']);
Route::post('/whatsapp-Delete',[WhatsappController::class,'WhatsappLinkDelete']);

Route::get('/testimonial-list',[TestimonialController::class,'TestimonialList'])->name('testimoniallist');
Route::get('/testimonial-add',[TestimonialController::class,'TestimonialAdd'])->name('testimonialadd');
Route::post('/testimonial-save',[TestimonialController::class,'TestimonialSave']);
Route::get('/testimonial-edit/{id}',[TestimonialController::class,'TestimonialEdit'])->name('testimonialedit');
Route::post('/testimonial-update',[TestimonialController::class,'TestimonialUpdate']);
Route::post('/testimonial-delete',[TestimonialController::class,'TestimonialDelete']);

Route::get('/password-change',[PasswordController::class,'PasswordChange'])->name('passwordchange');
Route::post('/password-save',[PasswordController::class,'PasswordSave'])->name('passwordsave');

//sample pages for form and table
Route::get('/form',[AdminController::class,'Form']);
Route::get('/table',[AdminController::class,'Table']);

});


/**********************************************************************************
 * ********************************************************************************
 * ***************************** User-side ***************************************
 * ********************************************************************************/

Route::get('/',[HomeController::class,'Index'])->name('index');
Route::post('/get-course',[AjaxController::class,'GetCourse']);

Route::post('/consultation-save',[AjaxController::class,'ConsultationSave']);

Route::get('/join-community',[HomeController::class,'Course'])->name('course');

Route::get('/freeresources',[HomeController::class,'FreeResource'])->name('freeresources');
Route::get('/freeresources-sub/{id}',[HomeController::class,'FreeResourceSub1'])->name('freeresourcessub');
Route::get('/freeresources-sub-file/{id}',[HomeController::class,'FreeResourceFile'])->name('freeresourcesfile');

Route::get('/wa-groups',[HomeController::class,'IgnouTalk'])->name('ignoutalk');
Route::get('/blog-detail/{id}',[HomeController::class,'BlogDetail'])->name('blogdetail');
Route::post('/blog-comments-save',[AjaxController::class,'BlogCommentsSave']);

Route::get('/blog-page',[HomeController::class,'BlogPage'])->name('blogpage');
Route::post('/get-blogcategory',[HomeController::class,'GetBlogCategory']);
Route::post('/get-blog-sorted',[HomeController::class,'GetBlogSorted']);
Route::post('/blog-search',[HomeController::class,'GetBlogSearch']);

Route::get('/ignoutube',[HomeController::class,'IgnouTube'])->name('ignoutube');
Route::post('/get-playlist',[AjaxController::class,'GetPlaylist'])->name('plylist');

Route::get('/free-trial',[HomeController::class,'LandingPage'])->name('landingpage');

