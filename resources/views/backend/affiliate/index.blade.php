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
            <h1 class="m-0 text-dark">Manage Affiliate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color:#ff3300">affiliate</li>
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
                    <h3>Affiliate List
                    <a class="btn btn-success btn-sm float-right" href="{{route('affiliates.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Affiliate</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm text-center" width="100%" >
                        <thead style="color:brown;background:#B2beb5">
                            <tr>
                            <th width="30%">Name</th>
                            <th width="30%">Email</th>
                            <th width="30%">Phone</th>
                            <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody style="color:#660033">
                            @foreach($affiliates as $key => $affiliate)
                            <tr>
                            <td>{{ $affiliate->name ?? '---' }}</td>
                            <td>{{ $affiliate->email }}</td>
                            <td>{{ $affiliate->phone ?? '---' }}</td>
                            <td>
                                <a title="Edit" class="btn btn-primary btn-sm" href="{{route('affiliates.edit',$affiliate->id)}}"><i class="fa fa-edit"></i></a>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="row d-flex justify-content-between mt-4 col-md-12" style="text-align: right">

                           {{ $affiliates->appends(Request::all())->links() }}

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
