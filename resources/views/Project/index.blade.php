@php
    $page ='project'
@endphp
@extends('lte3.layouts.app')
@section('title', ucfirst($page))
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($page)}} List <a href="{{ route('project.create') }}"><span
                        class="ml-3 btn btn-sm btn-success">Add</span></a> </h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Developer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) < 1)
                        <tr>
                            <td colspan="4" class="text-center">Data not found.</td>
                        </tr>
                    @else
                        @foreach ($data as $key => $val)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ isset($val->developer->brand->name)?$val->developer->brand->name:''}} {{isset($val->developer->name)?$val->developer->name:'' }}</td>
                                <td>

                                    <form action="{{ route('project.destroy', $val->id) }}" method="POST">
                                        <a href="{{ route('project.show', $val->id) }}" class="btn btn-primary "> <i
                                                class="fa-sharp fa-solid fa-magnifying-glass">&nbsp;</i>View</a>
                                        <a href="{{ route('project.edit', $val->id) }}" class="btn btn-warning"> <i
                                                class="fa-sharp fa-solid fa-pen">&nbsp;</i>Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btnSubmit btn btn-danger "
                                            data-id="{{ $val->id }}"><i class="fa-sharp fa-solid fa-trash">&nbsp;</i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>



        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix ">
            <div class="float-right">
                {{ $data->links() }}
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $('.btnSubmit').click(function(e) {
            e.preventDefault();
            $form = $(this).closest('form');

            $.confirm({
                title: 'Confirm !',
                content: 'Do you want to delete Data.',
                type: 'red',
                buttons: {
                    cancel: function() {},
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-red',
                        action: function() {
                            $form.submit();
                        }
                    },
                }
            });

        });

        // 
    </script>
@endsection
