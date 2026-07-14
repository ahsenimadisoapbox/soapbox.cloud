<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EhsAiModule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EhsAiModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = EhsAiModule::orderBy('sort_order')
            ->get();

        return view(
            'admin.ehs-ai-modules.index',
            compact('modules')
        );
    }

    public function create()
    {
        return view(
            'admin.ehs-ai-modules.create'
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            $this->rules()
        );
        if ($request->hasFile('banner_image')) {

            $image = $request->file('banner_image');

            $imageName =
                time() .
                '-banner-' .
                Str::slug($request->name) .
                '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/ehs-ai'),
                $imageName
            );

            $data['banner_image'] =
                'uploads/ehs-ai/' .
                $imageName;
        }

        if ($request->hasFile('ai_assist_image')) {

            $image = $request->file('ai_assist_image');

            $imageName =
                time() .
                '-assist-' .
                Str::slug($request->name) .
                '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/ehs-ai'),
                $imageName
            );

            $data['ai_assist_image'] =
                'uploads/ehs-ai/' .
                $imageName;
        }

        $module = EhsAiModule::create($data);

        $this->saveRelations(
            $request,
            $module
        );

        return redirect()
            ->route('ehs-ai-modules.index')
            ->with(
                'success',
                'AI Module created.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(EhsAiModule $ehsAiModule)
    {
        $ehsAiModule->load([
            'helpItems',
            'trustPoints',
            'businessOutcomes'
        ]);

        return view(
            'admin.ehs-ai-modules.edit',
            compact('ehsAiModule')
        );
    }

    public function update(
        Request $request,
        EhsAiModule $ehsAiModule
    )
    {
        $data = $request->validate(
            $this->rules()
        );
        if ($request->hasFile('banner_image')) {

            if (
                $ehsAiModule->banner_image &&
                file_exists(
                    public_path(
                        $ehsAiModule->banner_image
                    )
                )
            ) {
                unlink(
                    public_path(
                        $ehsAiModule->banner_image
                    )
                );
            }

            $image = $request->file('banner_image');

            $imageName =
                time() .
                '-banner-' .
                Str::slug($request->name) .
                '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/ehs-ai'),
                $imageName
            );

            $data['banner_image'] =
                'uploads/ehs-ai/' .
                $imageName;
        }
        if ($request->hasFile('ai_assist_image')) {

            if (
                $ehsAiModule->ai_assist_image &&
                file_exists(
                    public_path(
                        $ehsAiModule->ai_assist_image
                    )
                )
            ) {
                unlink(
                    public_path(
                        $ehsAiModule->ai_assist_image
                    )
                );
            }

            $image = $request->file('ai_assist_image');

            $imageName =
                time() .
                '-assist-' .
                Str::slug($request->name) .
                '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/ehs-ai'),
                $imageName
            );

            $data['ai_assist_image'] =
                'uploads/ehs-ai/' .
                $imageName;
        }

        $ehsAiModule->update(
            $data
        );

        $this->saveRelations(
            $request,
            $ehsAiModule
        );

        return redirect()
            ->route('ehs-ai-modules.index')
            ->with(
                'success',
                'AI Module updated.'
            );
    }

    public function destroy(
        EhsAiModule $ehsAiModule
    )
    {
        if (
            $ehsAiModule->banner_image &&
            file_exists(public_path($ehsAiModule->banner_image))
        ) {
            unlink(public_path($ehsAiModule->banner_image));
        }

        if (
            $ehsAiModule->ai_assist_image &&
            file_exists(public_path($ehsAiModule->ai_assist_image))
        ) {
            unlink(public_path($ehsAiModule->ai_assist_image));
        }
        $ehsAiModule->delete();

        return back()->with(
            'success',
            'Deleted successfully.'
        );
    }
    private function rules()
    {
        return [

            'name' => 'required|max:255',

            'slug' => 'required|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'ai_assist_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'hero_title' => 'nullable|max:255',

            'hero_headline' => 'nullable|max:255',

            'hero_copy' => 'nullable',

            'why_ai_assist' => 'nullable',

            'human_loop_description' => 'nullable',
            'help_icon' => 'nullable',
            'business_outcome_icon' => 'nullable',

            'cta_title' => 'nullable|max:255',

            'cta_description' => 'nullable',

            'meta_title' => 'nullable|max:255',

            'meta_description' => 'nullable',

            'meta_keywords' => 'nullable'
        ];
    }
    private function saveRelations(
        Request $request,
        EhsAiModule $module
    )
    {
        /*
        |--------------------------------------------------------------------------
        | Help Items
        |--------------------------------------------------------------------------
        */

        $module->helpItems()->delete();

        foreach(
            $request->help_items ?? []
            as $item
        ){

            if(
                empty($item['name'])
            ){
                continue;
            }

            $module->helpItems()->create([
                'icon' => $item['icon'] ?? null,
                'name' => $item['name'],
                'description' => $item['description'] ?? null
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Trust Points
        |--------------------------------------------------------------------------
        */

        $module->trustPoints()->delete();

        foreach(
            $request->trust_points ?? []
            as $item
        ){

            if(
                empty($item['name'])
            ){
                continue;
            }

            $module->trustPoints()->create([
                'name' => $item['name']
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Business Outcomes
        |--------------------------------------------------------------------------
        */

        $module->businessOutcomes()->delete();

        foreach(
            $request->business_outcomes ?? []
            as $item
        ){

            if(
                empty($item['name'])
            ){
                continue;
            }

            $module->businessOutcomes()->create([
                'icon' => $item['icon'] ?? null,
                'name' => $item['name'],
                'description' => $item['description'] ?? null
            ]);
        }
    }
}
