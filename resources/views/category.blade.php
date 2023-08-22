@extends('master')
    @section('site-title')
        Category
    @endsection
    @section('main-master')
        <section class="content">
            <div class="container-fluid">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Category</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>   
                {{-- alern create seccess --}}
                @if (session('status'))
                    <div class="input-group mb-3">
                        <div class="input-group-prepend text-success text-center">
                            <script>
                                $(document).ready(function(){
                                    $(document).Toasts('create', {
                                        class: 'bg-success',
                                        title: 'Category Create Success!',
                                        autohide: true,
                                        delay: 3000,
                                    })
                                });
                            </script>
                        </div>
                    </div>
                @endif

                {{-- alern update seccess --}}
                @if (session('update-status'))
                    <div class="input-group mb-3">
                        <div class="input-group-prepend text-success text-center">
                            <script>
                                $(document).ready(function(){
                                    $(document).Toasts('create', {
                                        class: 'bg-success',
                                        title: 'Category Update Success!',
                                        autohide: true,
                                        delay: 3000,
                                    })
                                });
                            </script>
                        </div>
                    </div>
                @endif

                {{-- alern delete seccess --}}
                @if (session('delete-status'))
                    <div class="input-group mb-3">
                        <div class="input-group-prepend text-danger text-center">
                            <script>
                                $(document).ready(function(){
                                    $(document).Toasts('create', {
                                        class: 'bg-danger',
                                        title: 'Category Remove Success!',
                                        autohide: true,
                                        delay: 3000,
                                    })
                                });
                            </script>
                        </div>
                    </div>
                @endif

                <div class="create-category d-flex justify-content-between mb-3">
                    <h2></h2>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create Category</button>
                </div>

                <table class="table-bordered table table-striped mt-4" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Title</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Update At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                            @foreach ($dataCategory as $item)
                                <tr>
                                    <td>
                                        {{$i}}
                                        <input type="hidden" class="data-id" value="{{$item->id}}">
                                        <input type="hidden" class="data-category" value="{{$item->category_title}}">
                                    </td>
                                    <td class="category-title">{{$item->category_title}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary click_category" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger  data-delete" id="feature-remove-id" data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php $i++ ?>
                            @endforeach
                    </tbody>
                </table>
            </div>   
            
            <!-- Modal Create -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/create-category" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category title <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category" class="form-control company" id="inputEmail3" placeholder="Category Name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success swalDefaultSuccess">Save</button>  
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal Update-->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/update-category" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <input type="hidden" name="category_id" class="form-control" id="categoryid">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category title <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category" class="form-control" id="inputcategory" placeholder="category title" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Save Change</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal delete-->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/delete-category" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="data_id" class="form-control company" id="datafeature_id" placeholder="Company">
                                <label for="" class="text-danger">Are you sure to remove?</label>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Yes</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
@endsection