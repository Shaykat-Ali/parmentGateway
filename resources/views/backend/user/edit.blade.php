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
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color:#ff3300">user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
               <h3>Edit User

               <a class="btn btn-success btn-sm float-right" href="{{route('users.index')}}"><i class="fa fa-list"></i>&nbsp;User List</a>
                </h3>

              </div><!-- /.card-header -->
              <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group col-md-4">
                            <label for="user_type">User Type</label>
                              <select name="user_type" id="user_type" class="form-control">
                                  <option value=" ">Select User Type</option>
                                  <option value="Admin" {{  $user->user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                                  <option value="User" {{  $user->user_type == 'User' ? 'selected' : '' }}>User</option>
                              </select>
                            <font style="color:red">{{($errors->has('user_type'))?($errors->first('user_type')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{   $user->name }}" class="form-control" placeholder="please enter your name">
                            <font style="color:red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{   $user->email }}" class="form-control" placeholder="please enter your email">
                            <font style="color:red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Phone</label>
                            <input type="number" name="phone" id="email" value="{{   $user->phone }}" class="form-control" placeholder="please enter your phone">
                            <font style="color:red">{{($errors->has('phone'))?($errors->first('phone')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                         </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div style="text-align: right">
                        <button type="submit"   class="btn btn-primary">Update</button>
                    </div>
                </div>
              </form>
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
