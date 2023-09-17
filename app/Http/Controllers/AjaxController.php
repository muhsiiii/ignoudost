<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\Consultation;
use App\Models\Course;
use App\Models\Department;
use App\Models\FAQ;
use App\Models\FreeResource;
use App\Models\FreeResourceFile;
use App\Models\Ignoutube;
use App\Models\SubFolder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Constraint\Count;

class AjaxController extends Controller
{
    public function ConsultationSave(Request $request)
    {
        $ConsutSave=Consultation::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'qualification' => $request->qualification,
            'course' => $request->course,
            'reason' => $request->reason,
        ]);

        if($ConsutSave){
            $data['success']='success';
        }else{
            $data['error']='error';
        }
        echo json_encode($data);
    }

    public function BlogSave(Request $request)
    {
        $image1 = $request->file('image');
        $new_name = "Blog/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('Blog'), $new_name);

        $image2 = $request->file('dp');
        $new_name2 = "Blog/dp/" . time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('Blog/dp'), $new_name2);

        Blog::create([
            'image' => $new_name,
            'title' => $request->title,
            'description' => $request->description,
            'dp' => $new_name2,
            'name' => $request->name,
            'date' => $request->date,
            'about_bloger' => $request->blogabout,
            'blog_category' => $request->blogcat
        ]);

        $data['success'] = 'success';
        echo json_encode($data);
    }

    public function BlogEdit($id)
    {
        $data=Blog::find($id);
        $BlogCategories=BlogCategory::where('status',1)->get();
        return view('admin.blog_edit',compact('data','BlogCategories'));
    }

    public function BlogUpdate(Request $request)
    {
        $Blog=Blog::where('id',$request->blogid)->first();
        $image1 = $request->file('image');
        $image2 = $request->file('dp');

        if($image1=='')
        {
            $new_name1=$Blog->image;
        }
        else{
            $image1 = $request->file('image');
            $new_name1 = "Blog/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('Blog'), $new_name1);
        }
        if($image2=='')
        {
           $new_name2=$Blog->dp;
        }
        else{
           $image2 = $request->file('dp');
           $new_name2 = "Blog/dp/" . time() . '.' . $image2->getClientOriginalExtension();
           $image2->move(public_path('Blog/dp'), $new_name2);
        }

        Blog::where('id',$request->blogid)->update([
            'image' => $new_name1,
            'title' => $request->title,
            'description' => $request->description,
            'dp' => $new_name2,
            'name' => $request->name,
            'date' => $request->date,
            'blog_category' => $request->blog_id,
            'about_bloger' => $request->about,
        ]);

        $data['success'] = 'success';
        echo json_encode($data);
    }

    public function BlogDelete(Request $request)
    {
      Blog::where('id',$request->Bid)->delete();
      $data['success'] = 'success';
        echo json_encode($data);
    }

    public function AcademicSave(Request $request)
    {
           $AcademicImage=$request->file('image');
           $ImageName="academic/".time().'.'.$AcademicImage->getClientOriginalName();
           $AcademicImage->move(public_path('academic'),$ImageName);

           Academic::create([
            'image'=>$ImageName,
            'title'=>$request->title,
            'description'=>$request->description,
            'name'=>$request->name,
            'position'=>$request->position

           ]);

           $data['success']='success';
           echo json_encode($data);
    }

    public function AcademicDestroy($id)
    {
        $AcademicDelete=Academic::find($id);
        $AcademicDelete->delete();

        return redirect()->route('academics')->with('success', 'Academic record deleted successfully.');
    }

    public function DepartmentSave(Request $request)
    {
        Department::create([
            'departments'=>$request->department,
            'status'=>$request->status
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function DepartmentUpdate(Request $request)
    {
        $id=$request->Departmentid;
        $Department=Department::find($id);
        $Department->update([
            'departments'=>$request->department,
            'status'=>$request->status
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function CourseSave(Request $request)
    {
        $CourseImage=$request->file('image');
        $ImageName="courseimage/".time().'.'.$CourseImage->getClientOriginalName();
        $CourseImage->move(public_path('courseimage'),$ImageName);

        $CoursePdf=$request->file('timetable');
        $PdfName="coursepdf/".time().'.'.$CoursePdf->getClientOriginalName();
        $CoursePdf->move(public_path('coursepdf'),$PdfName);

        Course::create([
            'department'=>$request->department,
            'course_year'=>$request->courseyrid,
            'image'=>$ImageName,
            'course_name'=>$request->coursename,
            'batch'=>$request->batch,
            'duration'=>$request->duration,
            'university'=>$request->university,
            'time_table'=>$PdfName,
            'enroll_now'=>$request->enrollnow
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function CourseUpdate(Request $request)
    {
        $id=$request->Cid;
        $Courses=Course::find($id);

        $image1 = $request->file('image');
        $image2 = $request->file('timetable');

        if($image1=='')
        {
            $new_name1=$Courses->image;
        }
        else{
            $image1 = $request->file('image');
            $new_name1 = "courseimage/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('courseimage'), $new_name1);
        }

        if($image2=='')
        {
           $new_name2=$Courses->time_table;
        }
        else{
           $image2 = $request->file('timetable');
           $new_name2 = "coursepdf/" . time() . '.' . $image2->getClientOriginalExtension();
           $image2->move(public_path('coursepdf'), $new_name2);
        }

        $Courses->update([
            'department'=>$request->department,
            'course_year'=>$request->courseyrid,
            'image'=>$new_name1,
            'course_name'=>$request->coursename,
            'batch'=>$request->batch,
            'duration'=>$request->duration,
            'university'=>$request->university,
            'time_table'=>$new_name2,
            'enroll_now'=>$request->enrollnow
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function GetCourse(Request $req)
    {
        $Did = $req->Department_id;
        $Department=Department::where('id',$Did)->first();
        $Courses = Course::where('status', 1)->where('department',$Did)->get();

            $output = '';

            if($Department->status==1){

            foreach ($Courses as $C) {
                $output .= '
                <div id8="course-tab-content" class="col-lg-4 col-md-4 col-sm-6 mt-4">
                <div class="course-list">
                  <div class="course-img-dv">
                    <img class="course-img" src="'.$C->image.'" alt="">
                    <h5 class="postn-course-name mb-0">'.$C->batch.'</h5>
                    <p class="mentor">Mentorship Included</p>
                  </div>
                  <div class="course-details">
                    <h2 class="course-name pl-fifty pt-top">'.$C->course_name.'</h2>
                    <h4 class="grey-text mb-2 course-year pl-fifty">'.$C->batch.'</h4>
                    <h4 class="grey-text mb-2 pl-fifty">Duration: '.$C->duration.'</h4>
                    <h4 class="grey-text mb-3 pl-fifty">University: '.$C->university.'</h4>
                    <hr style="margin-bottom: 0px !important;">
                    <div class="course-navigate-btns">
                      <h3 class="timetable mb-0"><i style="vertical-align: middle;" class="ri-download-2-line"></i><a href="'.$C->time_table.'" download="">BROCHURE</a> </h3>
                      <h3 class="enroll mb-0"><a href="'.$C->enroll_now.'" target="_blank">ENROLL NOW</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              ';
            }
        }elseif($Department->status==2){
            $output .= '
            <div id8="course-tab-content" class="col-lg-12  mt-4">
            <div class="">
              <div class="course-img-dv ">
                <img  style="width:400px;margin:auto;display:table;" class="course-img coming-soon-img" src="/courseimage/comingsoon1.jpg" alt="">
              </div>
            </div>
          </div>';
        }
            echo $output;
    }

    public function BlogCommentsSave(Request $request)
    {
        Comment::create([
            'comments'=>$request->comment,
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function FAQSave(Request $request)
    {
        FAQ::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function FreeResourceSave(Request $request)
    {
        FreeResource::create([
            'folder_title'=>$request->folder_title,
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function SubFoldersSave(Request $request)
    {
        SubFolder::create([
            'parent_folder'=>$request->parent_id,
            'sub_folder'=>$request->subfolder_name
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function SubFoldersFileSave(Request $request)
    {
        $SubFolderFile=$request->file('pdf');
        $FileName="subfolder/files/".time().'.'.$SubFolderFile->getClientOriginalName();
        $SubFolderFile->move(public_path('subfolder/files'),$FileName);

        FreeResourceFile::create([
            'sub_folder'=>$request->subfolder_id,
            'files'=>$FileName,
            'title'=>$request->pdf_title
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function SubFoldersFileUpdate(Request $request)
    {
        $pdf = $request->file('pdf');
        $File_ID=$request->file_id;
        $Files=FreeResourceFile::find($File_ID);

        if($pdf=='')
        {
            $new_name=$Files->files;
        }
        else{
            $pdf = $request->file('pdf');
            $new_name = "subfolder/files/" . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('subfolder/files'), $new_name);
        }

        FreeResourceFile::where('id',$File_ID)->update([
            'files'=>$new_name,
            'title'=>$request->pdf_title
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function SubFoldersFilDelete(Request $request)
    {
         $SubFolder_ID=$request->file_id;
        //  return $SubFolder_ID;
        //  die;

         FreeResourceFile::where('id',$SubFolder_ID)->update([
            'status'=>0
         ]);

         $data['success']='success';
         echo json_encode($data);
    }

    public function FreeResourceSaveModal(Request $request)
    {
        FreeResource::create([
            'folder_title'=>$request->parent_name,
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function FreeResourceUpdate(Request $request)
    {
        $Parent_id=$request->parent_id;
        // return $Parent_id;
        $FreeResource=FreeResource::find($Parent_id);
        $FreeResource->update([
            'folder_title'=>$request->folder_title
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function FreeResourceDestroy(Request $request)
    {
        $Parent_Id=$request->parentfolder_id;

        FreeResource::where('id',$Parent_Id)->update([
            'status'=>0
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function SubFoldersSubUpdate(Request $request)
    {
        $SubFolderId=$request->subfolder_id;
        $SubFolder=SubFolder::find($SubFolderId);

        $SubFolder->update([
            'sub_folder'=>$request->subfolder_title
        ]);

        $data['success']='success';
        echo json_encode($data);

    }


    public function GetPlaylist(Request $req)
    {
        $Pid = $req->pid;

// print_r($Pid);
// die;

            $output = '';

            if($Pid=='all'){
                $Ignoutubes=Ignoutube::where('status',1)->latest()->get();
            foreach ($Ignoutubes as $C) {
                $videoTimestamp = Carbon::parse($C->updated_at);
                $timeAgo = $videoTimestamp->diffForHumans();
                $output .= '
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">

                <div class="ignoutube-page">
                '. $C->embeded_url .'

                <h3 class="ignoutube-head pt-2">'.$C->title.'</h3>
                <h4 class="ignoutube-sub-head">'.$C->name.'</h4>
                <div class="time-nd-btn">
                    <p class="mb-0">'.$timeAgo.'</p>
                    <a href="'.$C->youtube_link.'" target="_blank" class="ignou-primary-bg btn">Watch
                        now</a>
                </div>
            </div>
            </div>

              ';
            }
        }else{

            $Ignoutubes=Ignoutube::where('playlist',$Pid)->where('status',1)->latest()->get();
            foreach ($Ignoutubes as $C){
            $videoTimestamp = Carbon::parse($C->updated_at);
            $timeAgo = $videoTimestamp->diffForHumans();
            $output .= '
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <div class="ignoutube-page">
            '. $C->embeded_url .'
            <h3 class="ignoutube-head pt-2">'.$C->title.'</h3>
            <h4 class="ignoutube-sub-head">'.$C->name.'</h4>
            <div class="time-nd-btn">
                <p class="mb-0">'.$timeAgo.'</p>
                <a href="'.$C->youtube_link.'" target="_blank" class="ignou-primary-bg btn">Watch
                    now</a>
            </div>
        </div>
        </div>
          ';
        }

    }
    echo $output;

}
}
