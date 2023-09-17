<?php

namespace App\Http\Controllers;

use App\Models\Ignoutube;
use App\Models\Playlist;
use Illuminate\Http\Request;

class IgnouTubeController extends Controller
{

    public function IgnouPlayList()
    {
        $playlists=Playlist::where('status',1)->paginate(10);
        return view('admin.ignouplaylist',compact('playlists'));
    }

    public function IgnouPlayListSave(Request $request)
    {
          $Playlists=Playlist::create([
            'playlist'=>$request->playlist
          ]);

          if($Playlists){
            $data['success']='success';
          }else{
            $data['error']='error';
          }

          echo json_encode($data);
    }

    public function IgnouPlayListUpdate(Request $request)
    {
        $PlaylistUpdate=Playlist::where('id',$request->pid)->update([
            'playlist'=>$request->playlist
        ]);

        if($PlaylistUpdate){
            $data['success']='success';
        }else{
            $data['error']='error';
        }

        echo json_encode($data);
    }

    public function IgnouPlayListDelete(Request $request)
    {
        Playlist::where('id',$request->pid)->update([
            'status'=>0
        ]);

        Ignoutube::where('playlist',$request->pid)->update([
            'status'=>0
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function IgnouTubeList()
    {
        $IgnouTubes=Ignoutube::where('status',1)->paginate(10);
        $IgnouTubeCount=Ignoutube::count();
        return view('admin.ignoutubelist',compact('IgnouTubes','IgnouTubeCount'));
    }

    public function IgnouTubeAdd()
    {
        $Playlists=Playlist::where('status',1)->get();
        return view('admin.add_ignoutube',compact('Playlists'));
    }

    public function IgnouTubesave(Request $request)
    {
        Ignoutube::create([
            'playlist'=>$request->playlist,
            'embeded_url'=>$request->embed_url,
            'title'=>$request->video_title,
            'name'=>$request->name,
            'youtube_link'=>$request->youtube_url
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function IgnouTubeEdit($id)
    {
        $Ignoutube=Ignoutube::find($id);
        $Playlists=Playlist::where('status',1)->get();
         return view('admin.edit_ignoutube',compact('Ignoutube','Playlists'));
    }

    public function IgnouTubeUpdate(Request $request)
    {
        $Ignoutube_Id=$request->ignoutube_id;

        Ignoutube::where('id',$Ignoutube_Id)->update([
            'embeded_url'=>$request->embed_url,
            'title'=>$request->video_title,
            'name'=>$request->name,
            'youtube_link'=>$request->youtube_url,
            'playlist'=>$request->playlist
        ]);

        $data['success']='success';
        echo json_encode($data);
    }

    public function IgnouTubeDelete(Request $request)
    {
          $IgnouTubeID=$request->ignoutube_Id;

          Ignoutube::where('id',$IgnouTubeID)->delete();

          $data['success']='success';
          echo json_encode($data);
    }

}
