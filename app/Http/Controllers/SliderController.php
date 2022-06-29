<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use DB;
use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(15);
        return view('backend.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('backend.sliders.create',compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);


        try{
            $data = $request->all();
            if ($request->hasFile('image')){
                $image = $request->file('image');
                $file_name =time(). ('_') .$image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1200,400);
                $image_resize->save('backend-lib/images/sliders/'.$file_name);
                $data ['image'] = $file_name;
                Slider::create($data);
                return redirect()->route('sliders.create')->with('message', "Slider Added Successfully");

            }else{
                $data = $request->all();
                $data ['image'] = "image Did't Add";
                Slider::create($data);
                return redirect()->route('sliders.create')->with('message', "Slider Added Successfully");

            }

        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('backend.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $formType = 'edit';
//        dd($slider);
        return view('backend.sliders.create', compact('formType','slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        try{
            $data = $request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = time() . ('_') . $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(200, 200);
                unlink(public_path("backend-lib/images/sliders/$slider->image"));
                $image_resize->save('backend-lib/images/sliders/' . $file_name);
                $data ['image'] = $file_name;
            }
            $slider->update($data);
            return redirect()->route('sliders.index')->with('message', "Data has been updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        try{
            if(!empty($slider->passport_image) && file_exists(public_path("backend-lib/images/sliders/$slider->passport_image"))){
                unlink(public_path("backend-lib/images/sliders/$slider->passport_image"));
            };
            $slider->delete();
            return redirect()->route('sliders.index')->with('message', 'Data has been deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $sliders = DB::table ('sliders')->orderBy('id','desc')->where('title','like','%'.$search.'%')->paginate(15);

        return view('backend.sliders.index',['sliders' =>$sliders]);
    }


}
