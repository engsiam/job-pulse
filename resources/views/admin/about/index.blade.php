@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Blog</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.about-us.store') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control"name="title" value="{{ @$about->title }}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="" class="form-control summernote">{{ @$about->description }}</textarea>
                                </div>

                                <button class="btn btn-danger">Update</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload 4 Image</h4>
                        </div>

                        <div class="card-body">

        
                            <form action="{{ route('admin.about.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image[]" multiple>
                                </div>

                                <button class="btn btn-danger mb-3">Update</button>
                            </form>


             

                        </div>

      

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table>
                            @foreach ($aboutImage as $item)
                            <tr>
                                <td> <img width="100px" src="{{ asset(@$item->image) }}" alt=""></td>
                                <td> <a class="btn btn-danger delete-item my-2" href="{{ route('admin.about.image-delete', $item->id) }}"><i class='fas fa-trash'></i></a> </td>
                            </tr>
                            @endforeach
                        </table>
                     </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
