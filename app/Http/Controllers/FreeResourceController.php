<?php

namespace App\Http\Controllers;

use App\Models\FreeResource;
use App\Models\FreeResourceFile;
use App\Models\SubFolder;
use Illuminate\Http\Request;

class FreeResourceController extends Controller
{
    public function FreeResource()
    {

        $FreeResources=FreeResource::where('status',1)->paginate(10);
        $FreeResourceCount=FreeResource::where('status',1)->count();
        return view('admin.free_resource',compact('FreeResources','FreeResourceCount'));
    }

    public function FreeResourceEdit($id)
    {
        $FreeResources=FreeResource::find($id);
        return view('admin.free_resource_edit',compact('FreeResources'));
    }

    public function AddFreeResource()
    {
        return view('admin.add_free_resource');
    }

    public function SubFolders()
    {
        $SubFolders=SubFolder::where('status',1)->get();
        return view('admin.sub_folders',compact('SubFolders'));
    }

    public function ADDSubFolders()
    {
        $ParentFolders=FreeResource::all();
        return view('admin.add_sub_folders',compact('ParentFolders'));
    }

    public function SubFoldersSave()
    {
        return "hello";
    }

    public function SubFoldersFile($id)
    {
        $FreeResourceFile=FreeResourceFile::find($id);
        return view('admin.subfolder_file_upload',compact('FreeResourceFile'));
    }

    public function SubFoldersSub($id)
    {
        $SubFolders=SubFolder::where('parent_folder',$id)->where('status',1)->get();
        $id=$id;
        // $SubFolderFiles=FreeResourceFile::where()
        return view('admin.sub_folder_sub',compact('SubFolders','id'));
    }

    public function SubFoldersSubEdit($id)
    {
        $SubFolder=SubFolder::find($id);
         return view('admin.subfolder_edit',compact('SubFolder'));
    }

    public function SubFoldersFileList($id)
    {
        $id=$id;
        $FileUploads=FreeResourceFile::where('sub_folder',$id)->where('status',1)->get();
        return view('admin.sub_folder_file_list',compact('FileUploads','id'));
    }

    public function SubFoldersDestroy(Request $request)
    {
        // $parent_id=$request->parentfolder_id;
        $SubFolder_Id=$request->subfolder_id;

          SubFolder::where('id',$SubFolder_Id)->update([
            'status'=>0
          ]);

          $data['success']='success';
          echo json_encode($data);
    }



}
