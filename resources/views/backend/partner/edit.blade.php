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
               <h3>Edit Partner

               <a class="btn btn-success btn-sm float-right" href="{{route('partners.index')}}"><i class="fa fa-list"></i>&nbsp;Partner List</a>
                </h3>

              </div><!-- /.card-header -->
              <form action="{{ route('partners.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{  $user->name }}" class="form-control" placeholder="please enter your name">
                            <font style="color:red">{{($errors->has('name'))?($errors->first('name')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{  $user->email }}" class="form-control" placeholder="please enter your email">
                            <font style="color:red">{{($errors->has('email'))?($errors->first('email')):' '}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Phone</label>
                            <input type="number" name="phone" id="email" value="{{  $user->phone }}" class="form-control" placeholder="please enter your phone">
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
                        <button type="submit"   class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
@endpush
