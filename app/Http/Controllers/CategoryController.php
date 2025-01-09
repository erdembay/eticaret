<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. // Türkçe çevirisi: Kaynağın listesini görüntüler.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource. // Türkçe çevirisi: Belirtilen kaynağı görüntüler.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. // Türkçe çevirisi: Belirtilen kaynağı düzenlemek için formu gösterir.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage. // Türkçe çevirisi: Depolama alanındaki belirtilen kaynağı günceller.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage. // Türkçe çevirisi: Depolama alanındaki belirtilen kaynağı kaldırır.
     */
    public function destroy(Category $category)
    {
        //
    }
}
