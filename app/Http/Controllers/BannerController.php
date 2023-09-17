<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function Banner()
    {
        $banners=Banner::latest()->paginate(10);
        $bannerCount=Banner::latest()->count();

        return view('admin.banner',compact('banners','bannerCount'));
    }

    public function AddBanner()
    {
        return view('admin.add_banner');
    }

    public function BannerSave(Request $request)
    {
        $request->validate([
            'banner' => 'required|dimensions:width=1920,height=384',
        ]);

        $banner = $request->banner;
        $extension = $banner->extension();
        $file_Name = 'banner' . time() . '.' . $extension;
        $banner->move(public_path().'/Banner/', $file_Name);

        Banner::create([
            'banner'=>$file_Name
        ]);

        return redirect()->route('banner')->with('success', 'Banner Inserted successfully');
    }

    public function BannerDestroy($id)
    {
        $banner=Banner::find($id);
        $banner->delete();

        return redirect()->route('banner')->with('success','Banner Deleted Succesfully');
    }
}
