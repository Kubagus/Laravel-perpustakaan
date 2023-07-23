@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-primary">Edit Buku</h1>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Buku</h6>
        </div>
        <div class="card-body">
            <form action="/buku/{{ $buku->id }}" method="post"enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="Judul"class="text-primary font-weight-bold"> Judul Buku</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}">
                </div>

                @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="kode_buku"class="text-primary font-weight-bold"> Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku',$buku->kode_buku) }}">
                </div>

                @error('kode_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- <div class="form-group mb-3">
                    <label for="status"class="text-primary font-weight-bold"> Status Buku</label>
                    @if ($buku->stock == 0)
                        <input type="text" name="status" class="form-control" value="Empty">
                    @else
                        <input type="text" name="status" class="form-control" value="{{ old('status', $buku->status) }}">
                    @endif
                </div>

                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
                
                <div class="form-group mb-3">
                    <label for="status" class="text-primary font-weight-bold">status</label>
                    <select class="form-control" name="status">
                        @if ($buku->stock != 0)
                            <option value="In Stock" selected>In Stock</option>
                        @else
                            <option value="in stock">{{ $buku->status }}</option>
                            <option value="Empty">Empty</option>
                        @endif
                            {{-- <option value="in stock">{{ $buku->status }}</option>
                            <option value="">{{ $buku->stock == 0? 'Empty' : 'In Stock'}}</option> --}}
                    </select>
                </div>

                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <div class="form-group mb-3">
                    <label for="kategori" class="text-primary font-weight-bold">Kategori</label>
                    <select class="form-control" name="kategori_buku[]" id="multiselect" multiple="multiple">
                        @forelse ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @empty
                            tidak ada kategori
                        @endforelse

                    </select>
                </div>

                @error('kategori')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="pengarang" class="text-primary font-weight-bold">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control"
                        value="{{ old('pengarang', $buku->pengarang) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="stock" class="text-primary font-weight-bold">stock</label>
                    <input type="text" name="stock" class="form-control" value="{{ old('stock', $buku->stock) }}">
                </div>

                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('pengarang')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="penerbit" class="text-primary font-weight-bold">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control"
                        value="{{ old('penerbit', $buku->penerbit) }}">
                </div>

                @error('penerbit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="tahun_terbit"class="text-primary font-weight-bold">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"class="form-control">
                </div>

                @error('tahun_terbit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="deskripsi"class="text-primary font-weight-bold">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="2">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                </div>

                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="photoProfile" class="text-md text-primary font-weight-bold">Tambah Sampul Buku</label>
                    <div class="custom-file">
                        <input type="file" name="gambar" id="gambar"
                            value="{{ old('gambar') }}">{{ old('gambar') }}
                    </div>
                </div>

                @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end">
                    <a href="/buku" class="btn btn-danger mx-2">Kembali</a>
                    <button type="submit" class="btn btn-primary px-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#multiselect').select2({
            allowClear: true
        });
    </script>
@endsection
