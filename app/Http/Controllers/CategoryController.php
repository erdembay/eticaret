<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. // Türkçe çevirisi: Kaynağın listesini görüntüler.
     */
    public function index()
    {
        //
        $categoryList = Category::paginate(10); // Kategori listesini alır.
        return view('admin.category.index', compact('categoryList')); // admin/category/index.blade.php sayfasına yönlendirir.
    }

    /**
     * Show the form for creating a new resource. // Türkçe çevirisi: Yeni bir kaynak oluşturmak için formu gösterir.
     */
    public function create()
    {
        $categoryList = Category::all(); // Kategori listesini alır.
        return view('admin.category.create_edit', compact('categoryList')); // admin/category/create_edit.blade.php sayfasına yönlendirir.
    }

    /**
     * Store a newly created resource in storage. // Türkçe çevirisi: Depolama alanında yeni oluşturulan kaynağı saklar.
     */
    public function store(CategoryStoreRequest $request)
    {
        //
        $data = $request->only(['name', 'description', 'short_description']);
        $slug = Str::slug($request->slug);
        if(is_null($slug)){
            $slug = Str::slug(mb_substr($data['name'], 0, 40));
            $checkSlug = Category::where('slug', $slug)->first();
            if($checkSlug){
                return redirect()->back()->withErrors(['slug' => 'Bu slug daha önce alınmış.'])->withInput();
            }
        }
        $data['slug'] = $slug;
        $data['status'] = $request->has('status') ? true : false;
        $data['parent_id'] = $request->parent_id == 0 ? null : $request->parent_id;
        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource. // Türkçe çevirisi: Belirtilen kaynağı görüntüler.
     */
    public function show(Category $category)
    {
        //
        dd($category);
    }

    /**
     * Show the form for editing the specified resource. // Türkçe çevirisi: Belirtilen kaynağı düzenlemek için formu gösterir.
     */
    public function edit(Category $category)
    {
        //
        $categoryList = Category::all();
        return view('admin.category.create_edit', compact('category', 'categoryList'));
    }

    /**
     * Update the specified resource in storage. // Türkçe çevirisi: Depolama alanındaki belirtilen kaynağı günceller.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //
        $data = $request->only(['name', 'description', 'short_description']);
        $slug = Str::slug($request->slug);
        if(is_null($slug)){
            $slug = Str::slug(mb_substr($data['name'], 0, 40));
            $checkSlug = Category::where('slug', $slug)->first();
            if($checkSlug){
                return redirect()->back()->withErrors(['slug' => 'Bu slug daha önce alınmış.'])->withInput();
            }
        }
        $data['slug'] = $slug;
        $data['status'] = $request->has('status') ? true : false;
        $data['parent_id'] = $request->parent_id == 0 ? null : $request->parent_id;
        $category->update($data);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage. // Türkçe çevirisi: Depolama alanındaki belirtilen kaynağı kaldırır.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('Kategori başarıyla silindi.'); // Başarı mesajı
        return redirect()->back();
    }

    public function front()
    {
        $categories = Category::query()->with('children')->whereHas('children')->whereNull('parent_id')->get();
        return view('categories', compact('categories'));
    }
}
