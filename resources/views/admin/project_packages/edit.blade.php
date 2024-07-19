@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Form Edit') }}</h1>
                    <a href="{{ route('admin.project_packages.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Progress</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($project_package->galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>
                                            @if (in_array(pathinfo($gallery->media_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <a href="{{ Storage::url($gallery->media_path) }}" target="_blank">
                                                    <img width="100" src="{{ Storage::url($gallery->media_path) }}" alt="{{ $gallery->name }}">
                                                </a>
                                            @elseif (in_array(pathinfo($gallery->media_path, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                                                <video width="100" controls>
                                                    <source src="{{ Storage::url($gallery->media_path) }}" type="video/{{ pathinfo($gallery->media_path, PATHINFO_EXTENSION) }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <a href="{{ Storage::url($gallery->media_path) }}" target="_blank">View Media</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.project_packages.galleries.edit', [$project_package, $gallery]) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>              
                                            <form onclick="return confirm('Are you sure?');" class="d-inline-block" action="{{ route('admin.project_packages.galleries.destroy', [$project_package, $gallery]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>                              
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">No Media</td>
                                    </tr>
                                @endforelse                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.project_packages.galleries.store', [$project_package]) }}" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Progress</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="">
                                </div>
                            </div>
                           
                            <div class="form-group row border-bottom pb-4">
                                <label for="media" class="col-sm-2 col-form-label">Media</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="media" value="{{ old('media') }}" id="media" accept="image/*,video/*">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>

                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.project_packages.update', [$project_package]) }}">
                            @csrf 
                            @method('put')
                            <div class="form-group row border-bottom pb-4">
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" value="{{ old('type', $project_package->type) }}" id="type" placeholder="example: 4D5N">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="Location" class="col-sm-2 col-form-label">Layanan</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="Location" name="location" value="{{ old('location', $project_package->location) }}" placeholder="contoh: SCANDINAVIAN">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="price" name="price" value="{{ old('price', $project_package->price) }}" placeholder="example: 300">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" name="type" id="description" cols="30" rows="7" placeholder="Description text...">{{ old('description', $project_package->description) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="Location" class="col-sm-2 col-form-label">Termin</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="Termin" name="termin" value="{{ old('termin', $project_package->termin) }}" placeholder="contoh: 3x">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="price" class="col-sm-2 col-form-label">Nominal</label>
                                <div class="col-sm-10">
                                <input text="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal', $project_package->nominal) }}" placeholder="contoh: 777">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="Location" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $project_package->keterangan) }}" placeholder="contoh: Transfer via bank">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('styles')
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection