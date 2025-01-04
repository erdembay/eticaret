@extends('layouts.front')
@section('title', 'Siparişlerim')
@push('css')
@endpush
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Siparişlerim</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sipariş No</th>
                            <th>Toplam</th>
                            <th>Ödeme Tipi</th>
                            <th>Durum</th>
                            <th>Detay</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
