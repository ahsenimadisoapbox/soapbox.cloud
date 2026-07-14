<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\IndustryOperation;
use App\Models\IndustryRegulation;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        $modules = Module::where('is_live', 1)
        ->where('status', 1)
        ->orderBy('name')
        ->get();

        return view('admin.industries.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => 'required|string|max:255',

            'headline' => 'nullable|string',

            'description' => 'nullable',

            'operations_reality' => 'nullable',

            'did_you_know' => 'nullable',

            'legacy_system_intro' => 'nullable',

            'key_takeaways' => 'nullable',

            'common_programmes' => 'nullable',

            'icon' => 'nullable|string',

            'image' => 'nullable|image',

            'banner_image' => 'nullable|image',

            'module_ids' => 'nullable|array',
            'cta_title' => 'nullable|string|max:255',

            'cta_description' => 'nullable',

            'meta_title' => 'nullable',

            'meta_description' => 'nullable',

            'meta_keywords' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->title);

        $data['module_ids'] = $request->module_ids ?? [];

        $data['scaling_silo_trap'] =
            $request->scaling_silo_trap ?? [];

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName =
                time() .
                '-industry.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/industries'),
                $imageName
            );

            $data['image'] =
                'uploads/industries/' . $imageName;
        }

        if ($request->hasFile('banner_image')) {

            $banner = $request->file('banner_image');

            $bannerName =
                time() .
                '-banner.' .
                $banner->getClientOriginalExtension();

            $banner->move(
                public_path('uploads/industries'),
                $bannerName
            );

            $data['banner_image'] =
                'uploads/industries/' . $bannerName;
        }

        $industry = Industry::create($data);

        foreach ($request->operations ?? [] as $operation) {

            if (!empty($operation['name'])) {

                IndustryOperation::create([

                    'industry_id' => $industry->id,

                    'name' => $operation['name'],

                    'description' =>
                        $operation['description'] ?? null,
                ]);
            }
        }

        foreach ($request->regulations ?? [] as $regulation) {

            if (!empty($regulation['name'])) {

                IndustryRegulation::create([

                    'industry_id' => $industry->id,

                    'name' => $regulation['name'],

                    'description' =>
                        $regulation['description'] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.industries.index')
            ->with(
                'success',
                'Industry Created Successfully'
            );
    }

    public function edit($id)
    {
        $industry = Industry::with([
            'operations',
            'regulations'
        ])->findOrFail($id);

        $modules = Module::where('is_live', 1)
        ->where('status', 1)
        ->orderBy('name')
        ->get();

        return view(
            'admin.industries.edit',
            compact(
                'industry',
                'modules'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $industry = Industry::findOrFail($id);

        $data = $request->validate([

            'title' => 'required|string|max:255',

            'headline' => 'nullable|string',

            'description' => 'nullable',

            'operations_reality' => 'nullable',

            'did_you_know' => 'nullable',

            'legacy_system_intro' => 'nullable',

            'key_takeaways' => 'nullable',

            'common_programmes' => 'nullable',

            'icon' => 'nullable|string',

            'image' => 'nullable|image',

            'banner_image' => 'nullable|image',

            'module_ids' => 'nullable|array',
            
            'cta_title' => 'nullable|string|max:255',

            'cta_description' => 'nullable',

            'meta_title' => 'nullable',

            'meta_description' => 'nullable',

            'meta_keywords' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->title);

        $data['module_ids'] =
            $request->module_ids ?? [];

        $data['scaling_silo_trap'] =
            $request->scaling_silo_trap ?? [];

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName =
                time() .
                '-industry.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/industries'),
                $imageName
            );

            $data['image'] =
                'uploads/industries/' . $imageName;
        }

        if ($request->hasFile('banner_image')) {

            $banner = $request->file('banner_image');

            $bannerName =
                time() .
                '-banner.' .
                $banner->getClientOriginalExtension();

            $banner->move(
                public_path('uploads/industries'),
                $bannerName
            );

            $data['banner_image'] =
                'uploads/industries/' . $bannerName;
        }

        $industry->update($data);

        $industry->operations()->delete();

        foreach ($request->operations ?? [] as $operation) {

            if (!empty($operation['name'])) {

                IndustryOperation::create([

                    'industry_id' => $industry->id,

                    'name' => $operation['name'],

                    'description' =>
                        $operation['description'] ?? null,
                ]);
            }
        }

        $industry->regulations()->delete();

        foreach ($request->regulations ?? [] as $regulation) {

            if (!empty($regulation['name'])) {

                IndustryRegulation::create([

                    'industry_id' => $industry->id,

                    'name' => $regulation['name'],

                    'description' =>
                        $regulation['description'] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.industries.index')
            ->with(
                'success',
                'Industry Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);

        $industry->delete();

        return back()->with(
            'success',
            'Industry Deleted Successfully'
        );
    }

    public function show($id)
    {
        $industry = Industry::with([
            'operations',
            'regulations',
            'services'
        ])->findOrFail($id);

        return view(
            'admin.industries.show',
            compact('industry')
        );
    }
}