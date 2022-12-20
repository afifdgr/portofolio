@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category</h4>

                            <form method="post" action="{{ route('update.blog.category') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $blogCategories->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="blog_category" type="text"
                                            id="example-text-input" value="{{ $blogCategories->blog_category }}">
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Blog Category Name">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
