@extends('layouts.admin')
@section('title', isset($category) ? 'Kategori Düzenle' : 'Kategori Ekle')
@push('css')
@endpush
@section('body')
    <div class="row justify-content-center">
        <div class="col col-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($category) ? 'Kategori Düzenle' : 'Kategori Ekle' }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @php
                    $currentRoute = !isset($category)
                        ? route('admin.category.store')
                        : route('admin.category.update', $category->id);
                @endphp
                <form action="{{ $currentRoute }}" method="POST" role="form" id="quickForm">
                    @csrf
                    @isset($category)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Kategori Adı</label>
                            <input type="text" class="form-control" id="name"
                                value="{{ isset($category->name) ? $category->name : old('name') }}"
                                placeholder="Kategori Adı Giriniz." name="name">
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Slug --}}
                        <div class="form-group">
                            <label for="slug">Kategori Slug</label>
                            <input type="text" value="{{ isset($category->slug) ? $category->slug : old('slug') }}"
                                class="form-control" id="slug" placeholder="Kategori Slug Giriniz." name="slug">
                            @error('slug')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- short description --}}
                        <div class="form-group">
                            <label for="short_description">Kısa Açıklama</label>
                            <textarea class="form-control" id="short_description" rows="3" placeholder="Kısa Açıklama Giriniz."
                                name="short_description">{{ isset($category->short_description) ? $category->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" id="description" rows="6" placeholder="Açıklama Giriniz." name="description">{{ isset($category->description) ? $category->description : old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- parent category --}}
                        <div class="form-group">
                            <label for="parent_id">Ana Kategori (Opsiyonel)</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="0">Ana Kategori Seçiniz (Opsiyonel)</option>
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
                                <input type="checkbox" class="custom-control-input"
                                    {{ isset($category->status) ? ($category->status ? 'checked' : '') : (old('status') ? 'checked' : '') }}
                                    id="status" name="status">
                                <label class="custom-control-label" for="status">Aktif/Pasif</label>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="javascript:void(0);" id="btnSubmit" class="btn btn-success btn-block btn-xs">Kaydet</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let bntSubmit = document.getElementById('btnSubmit');
            let form = document.getElementById('quickForm');
            let name = document.getElementById('name');
            let slug = document.getElementById('slug');
            let short_description = document.getElementById('short_description');
            let description = document.getElementById('description');
            let parent_id = document.getElementById('parent_id');
            let status = document.getElementById('status');
            bntSubmit.addEventListener('click', function() {
                if (name.value.trim().length < 1) {
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        newestOnTop: false,
                        progressBar: true,
                        positionClass: "toast-bottom-center",
                        preventDuplicates: false,
                        onclick: null,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                    toastr.error('Kategori Adı Boş Bırakılamaz.', 'Hata');
                } else if (slug.value.trim().length < 1) {
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        newestOnTop: false,
                        progressBar: true,
                        positionClass: "toast-bottom-center",
                        preventDuplicates: false,
                        onclick: null,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                    toastr.error('Kategori Slug Boş Bırakılamaz.', 'Hata');
                } else if (short_description.value.trim().length < 1) {
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        newestOnTop: false,
                        progressBar: true,
                        positionClass: "toast-bottom-center",
                        preventDuplicates: false,
                        onclick: null,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                    toastr.error('Kısa Açıklama Boş Bırakılamaz.', 'Hata');
                } else if (description.value.trim().length < 1) {
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        newestOnTop: false,
                        progressBar: true,
                        positionClass: "toast-bottom-center",
                        preventDuplicates: false,
                        onclick: null,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                    toastr.error('Açıklama Boş Bırakılamaz.', 'Hata');
                } else {
                    form.submit();
                }
            });
        });
    </script>
@endpush
