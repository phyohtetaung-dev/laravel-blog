<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomeSliderRequest;
use App\Http\Requests\UpdateHomeSliderRequest;
use App\Models\HomeSlider;
use App\Services\ImageService;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeSliders = HomeSlider::orderByDesc('id')->paginate(25);

        return view('admin.home-slider.index', compact('homeSliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeSliderRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = (new ImageService)->upload($file, 636, 852);
        }
        HomeSlider::create($data);

        return to_route('admin.home-slider')->with('success', 'Home Slider was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $homeSlider)
    {
        return view('admin.home-slider.edit', compact('homeSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeSliderRequest  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeSliderRequest $request, HomeSlider $homeSlider)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = (new ImageService)->upload($file, 636, 852);
        }
        $homeSlider->update($data);

        return to_route('admin.home-slider')->with('success', 'Home Slider was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $homeSlider)
    {
        $homeSlider->delete();

        return redirect()->back()->with('success', 'Home Slider was successfully deleted.');
    }

    public function updateStatus(HomeSlider $homeSlider)
    {
        $inactiveHomeSlider = HomeSlider::where('status', HomeSlider::STATUS['active']);
        $inactiveHomeSlider->update([
            'status' => HomeSlider::STATUS['inactive'],
        ]);
        $homeSlider->update([
            'status' => HomeSlider::STATUS['active'],
        ]);

        return to_route('admin.home-slider')->with('Home Slider Status was successfully updated.');
    }
}
