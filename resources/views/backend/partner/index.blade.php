@extends('backend.layouts.app')
@push('css')
@endpush
@section('content')

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Partner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color:#ff3300">partner</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div> --}}
    @if(session()->has('success'))
        <div class="alert alert-success m-3">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger m-3">
            {{ session()->get('error') }}
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12" >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" >

                <div class="card-header">
                    <h3>Partner List
                    <a class="btn btn-success btn-sm float-right" href="{{route('partners.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Partner</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover text-center" width="100%" >
                        <thead style="color:brown;background:#B2beb5">
                            <tr>
                            <th width="10%">Image</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
                            <th width="20%">Phone</th>
                            <th width="15%">Status</th>
                            <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody style="color:#660033">
                            @foreach($users as $key => $user)
                            <tr>
                            <td><img src="{{ $user->image ? asset('storage/'.$user->image) : asset('user.png') }}" alt="user" width="50px" height="50px" /></td>
                            <td>{{ $user->name ?? '---' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '---' }}</td>
                            <td>
                                @if($user->status == 2)
                                  <span class="badge bg-info pr-2 pl-3">Pending</span>
                                @endif
                                @if($user->status == 0)
                                <span class="badge bg-danger pr-2 pl-3">Inactive</span>
                                @endif
                                @if($user->status == 1)
                                <span class="badge bg-success pr-3 pl-3">Active</span>
                                @endif
                            </td>

                            <td>
                                <a title="Edit" class="btn btn-primary btn-sm" href="{{route('partners.edit',$user->id)}}"><i class="fa fa-edit"></i></a>
                                <a title="Details" class="btn btn-success btn-sm" href="{{route('partners.show',$user->id)}}"><i class="fa fa-eye"></i></a>

                                <a title="@if($user->status == 2)Approve @endif  @if($user->status == 1)  Inactive @endif  @if($user->status == 0)Active @endif"  class="btn btn-secondary btn-sm" href="{{route('partners.edit',$user->id)}}"><i class="fa fa-check-circle"></i></a>

                                {{-- <a title="Delete" onclick="return confirm('Are you sure to delete!!')" class="btn btn-danger btn-sm" href="{{route('partners.destroy',$user->id)}}"><i class="fa fa-trash"></i></a> --}}
                            </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="row d-flex justify-content-between mt-4 col-md-12" style="text-align: right">

                           {{ $users->appends(Request::all())->links() }}

                    </div>
                </div>

            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



    <!-- /.content -->

  </div>
@endsection
@push('js')
@endpush
