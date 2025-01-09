@extends('layouts.admin')
@section('title', 'Kategori')
@push('css')
@endpush
@section('body')
    <div class="row justify-content-center">
        <div class="col col-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kategori Ekle/Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.category.store') }}" method="POST" role="form" id="quickForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Kategori Adı</label>
                            <input type="text" class="form-control" id="name" placeholder="Kategori Adı Giriniz."
                                name="name">
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Slug --}}
                        <div class="form-group">
                            <label for="slug">Kategori Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Kategori Slug Giriniz."
                                name="slug">
                            @error('slug')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- short description --}}
                        <div class="form-group">
                            <label for="short_description">Kısa Açıklama</label>
                            <textarea class="form-control" id="short_description" rows="3" placeholder="Kısa Açıklama Giriniz."
                                name="short_description"></textarea>
                            @error('short_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" id="description" rows="6" placeholder="Açıklama Giriniz." name="description"></textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- parent category --}}
                        <div class="form-group">
                            <label for="parent_id">Ana Kategori (Opsiyonel)</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Ana Kategori Seçiniz (Opsiyonel)</option>
                                @foreach ($categoryList as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- status checkbox --}}
                        <div class="form-group">
                            <label for="status">Durum</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="status" name="status">
                                <label class="custom-control-label" for="status">Aktif/Pasif</label>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
