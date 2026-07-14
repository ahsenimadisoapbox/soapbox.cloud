<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('sort_order', 'asc')->with('category')->get();
        return view('admin.modules.index', compact('modules'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.modules.create', compact('categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $data = $this->validateData($request);
            $data['slug'] = Str::slug($request->name);

            // module image
            // if ($request->hasFile('image')) {
            //     $data['image'] = $this->uploadImage($request->file('image'), 'modules', $request->name);
            // }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $request->photo->getClientOriginalName();

                $image->move(public_path('uploads/modules'), $imageName);

                $data['image'] = 'uploads/modules/' . $imageName;
            }
            if ($request->hasFile('banner_image')) {

                $image = $request->file('banner_image');

                $imageName =
                    time() .
                    '-' .
                    Str::slug($request->name) .
                    '-banner.' .
                    $image->getClientOriginalExtension();

                $image->move(
                    public_path('uploads/modules'),
                    $imageName
                );

                $data['banner_image'] =
                    'uploads/modules/' . $imageName;
            }

            $module = Module::create($data);

            $this->storeRelations($module, $request);

            DB::commit();

            return redirect()->route('admin.modules.index')->with('success', 'Module Created Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $module = Module::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.modules.edit', compact('module', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $data = $request->all();

        // ===== BASIC UPDATE =====
        $module->update([
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'icon' => $data['icon'],
            'sort_order' => $data['sort_order'],
            'status' => $data['status'],
            'is_live' => $data['is_live'],
            'cta' => $data['cta'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
        ]);

        // ===== IMAGE =====
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('modules', 'public');
            $module->update(['image' => $path]);
        }

        if ($request->hasFile('image')) {

            if ($module->image && file_exists(public_path($module->image))) {
                unlink(public_path($module->image));
            }

            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/modules'), $imageName);
            $module->update(['image' => 'uploads/modules/' . $imageName]);
        }
        if ($request->hasFile('banner_image')) {

            if ($module->banner_image && file_exists(public_path($module->banner_image))) {
                unlink(public_path($module->banner_image));
            }

            $banner_imageName = time() . '_' . $request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path('uploads/modules'), $banner_imageName);
            $module->update(['banner_image' => 'uploads/modules/' . $banner_imageName]);
        }

        // ===============================
        // 🔥 KEY CAPABILITIES FIX
        // ===============================
        if ($request->has('key_capabilities')) {
            $module->keyCapabilities()->delete();

            foreach ($request->key_capabilities as $item) {
                if (!empty($item['name'])) {
                    $module->keyCapabilities()->create([
                        'name' => $item['name'],
                        'description' => $item['description'] ?? null,
                    ]);
                }
            }
        }

        // ===============================
        // 🔥 USES FIX
        // ===============================
        if ($request->has('uses')) {
            $module->uses()->delete();

            foreach ($request->uses as $item) {
                if (!empty($item['name'])) {
                    $module->uses()->create([
                        'name' => $item['name'],
                        'description' => $item['description'] ?? null,
                    ]);
                }
            }
        }

        // ===============================
        // 🔥 SOLUTIONS (WITH IMAGE)
        // ===============================
        if ($request->has('solutions')) {

            $oldSolutions = $module->solutions->keyBy('id');

            $module->solutions()->delete();

            foreach ($request->solutions as $index => $item) {

                $imagePath = null;

                if ($request->hasFile("solutions.$index.image")) {

                    $image = $request->file("solutions.$index.image");

                    $imageName = time() . '-' . Str::slug($item['name']) . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('uploads/solutions'), $imageName);

                    $imagePath = 'uploads/solutions/' . $imageName;

                } else {

                    if (!empty($item['id']) && isset($oldSolutions[$item['id']])) {
                        $imagePath = $oldSolutions[$item['id']]->image;
                    }
                }

                if (!empty($item['name'])) {

                    $module->solutions()->create([
                        'name' => $item['name'],
                        'description' => $item['description'] ?? null,
                        'image' => $imagePath,
                    ]);
                }
            }
        }

        // ===============================
        // (OPTIONAL) OTHER SECTIONS SAME LOGIC
        // ===============================
        if ($request->has('challenger')) {
            $module->challengers()->delete();

            foreach ($request->challenger as $item) {
                if (!empty($item['name'])) {
                    $module->challengers()->create([
                        'name' => $item['name'],
                        'description' => $item['description'] ?? null,
                    ]);
                }
            }
        }

        if ($request->has('measurable')) {
            $module->measurables()->delete();

            foreach ($request->measurables as $item) {
                if (!empty($item['name'])) {
                    $module->measurables()->create([
                        'name' => $item['name'],
                        'description' => $item['description'] ?? null,
                    ]);
                }
            }
        }
        if ($request->has('frameworks')) {
 
            $module->frameworks()->delete();
 
            foreach ($request->frameworks as $item) {
                if (!empty($item['name'])) {
                    $module->frameworks()->create([
                        'name' => $item['name'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.modules.index')
            ->with('success', 'Module updated successfully');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);

        $this->deleteFile($module->image);

        // delete solution images
        foreach ($module->solutions as $sol) {
            $this->deleteFile($sol->image);
        }

        $module->delete();

        return back()->with('success', 'Module Deleted Successfully');
    }

    /* ================= HELPERS ================= */

    private function validateData($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'banner_image' => 'nullable|image',
            'icon' => 'nullable|string',
            // 'category' => 'nullable|string',
            'challenger_heading' => 'nullable|string',
            'solution_heading' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'cta' => 'nullable|string',
            'is_live' => 'required|boolean',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'solutions.*.image' => 'nullable|image',
        ]);
    }

    private function uploadImage($request, $fieldName, $folder, $title)
    {
        if ($request->hasFile($fieldName)) {

            $image = $request->file($fieldName);

            $imageName = time() . '-' . Str::slug($title) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path("uploads/$folder"), $imageName);

            return "uploads/$folder/" . $imageName;
        }

        return null;
    }

    private function deleteFile($path)
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }

    private function storeRelations($module, $request)
    {
        $this->saveSimple($module, $request->challengers, 'challengers');
        $this->saveSimple($module, $request->key_capabilities, 'keyCapabilities');
        $this->saveSimple($module, $request->uses, 'uses');
        $this->saveSimple($module, $request->measurables, 'measurables');
        $this->saveFrameworks($module, $request->frameworks);
        $this->saveSolutions($module, $request->solutions, $request);
    }

    private function updateRelations($module, $request)
    {
        // delete old
        $module->challengers()->delete();
        $module->keyCapabilities()->delete();
        $module->uses()->delete();
        $module->measurables()->delete();
        $module->frameworks()->delete();

        foreach ($module->solutions as $sol) {
            $this->deleteFile($sol->image);
        }
        $module->solutions()->delete();

        // re-insert
        $this->storeRelations($module, $request);
    }

    private function saveSimple($module, $items, $relation)
    {
        if (!$items)
            return;

        foreach ($items as $item) {
            if (!empty($item['name'])) {
                $module->$relation()->create([
                    'name' => $item['name'],
                    'description' => $item['description'] ?? null,
                ]);
            }
        }
    }

    private function saveFrameworks($module, $items)
    {
        if (!$items)
            return;

        foreach ($items as $item) {
            if (!empty($item['name'])) {
                $module->frameworks()->create([
                    'name' => $item['name'],
                ]);
            }
        }
    }

    private function saveSolutions($module, $items, $request)
    {
        if (!$items)
            return;

        foreach ($items as $index => $item) {

            if (!empty($item['name'])) {

                $imagePath = null;

                if ($request->hasFile("solutions.$index.image")) {

                    $image = $request->file("solutions.$index.image");

                    $imageName = time() . '-' . Str::slug($item['name']) . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('uploads/solutions'), $imageName);

                    $imagePath = 'uploads/solutions/' . $imageName;
                }

                $module->solutions()->create([
                    'name' => $item['name'],
                    'description' => $item['description'] ?? null,
                    'image' => $imagePath,
                ]);
            }
        }
    }
}