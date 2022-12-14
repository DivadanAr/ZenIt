<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopProfile;
use App\Models\User;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = auth()->user()->shop;

        return view('seller.setting-store', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $shop = auth()->user()->shop;
     
        if(!isset($shop)){
            return redirect()->route('seller.setup.start');
        }

        return view('seller.setting-info', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $shop = ShopProfile::where('users_id', auth()->id())->first();

        
        $validated = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'gallery' => 'required',
            'instagram' ,
            'gmail' ,
            'linkedIn',
            'portofolio' => 'mimes:pdf',
        ]);
        // dd($validated);
        

        if (count($shop->gallery) > 0) {
            foreach ($shop->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $shop->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $shop->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
        
        $porto = null;
        if ($request->hasFile('portofolio')) {
            $porto = $request->file('portofolio')->storeAs(
                'portofolio',
                $name = auth()->user()->name. '.' . $request->file('portofolio')->getClientOriginalExtension(),
            );
        }  
        
        $shop->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'instagram' => $request->instagram,
            'gmail' => $request->gmail,
            'linkedIn' => $request->linkedIn,
        ]);

        if($request->portofolio != null){
            $shop->update([
                'portofolio' => 'storage/portofolio/'.$name,
            ]);
        }


        return redirect('/seller/setting-info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
