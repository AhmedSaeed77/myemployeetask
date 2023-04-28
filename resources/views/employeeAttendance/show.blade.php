@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')

    <div class="page-body ">
        <div class="container-xl">
            <div class="row row-cards">
              <div class="col-lg-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>Name</th>
                          <th>Proccess</th>
                          <th>Show All Times</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                        @foreach ($employees as $employee)
                        <tr>
                        <?php $i++; ?>
                            <td>{{ $i }}</td>
                          <td >{{ $employee->name }}</td>
                          <td>
                            @if( DB::table('attendances')->where('employee_id', $employee->id)->where('start','!=',null)->where('end',null)->first())
                                <button type="submit" onclick="deleteFunction1({{ $employee->id }})" class="btn btn-sm btn-primary flex-shrink-0  mt-4" disabled>Attendace</button>
                            @else
                                <button type="submit" onclick="deleteFunction1({{ $employee->id }})" class="btn btn-sm btn-primary flex-shrink-0  mt-4" >Attendace</button>
                            @endif
                            @if( DB::table('attendances')->where('employee_id', $employee->id)->where('start','!=',null)->where('end',null)->first())
                                <button  type="submit" onclick="deleteFunction2({{ $employee->id }})" class="btn btn-sm btn-danger flex-shrink-0  mt-4" >Departure</button>
                            @else
                                <button  type="submit" onclick="deleteFunction2({{ $employee->id }})" class="btn btn-sm btn-danger flex-shrink-0  mt-4"disabled >Departure</button>
                            @endif
                          </td>
                          <td >
                            <a class="btn btn-dark mt-4" href="{{ route('employeeattendace.show',$employee->id) }}" type="button">Show</a></td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function deleteFunction1(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "the employee is attendace !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                size: '100px',
                confirmButtonText: 'Attendace!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('employeeattendace.attendace') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id1,
                        },
                        success: (response) => {
                            if (response) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            }
                        },
                        error: function(reject) {
                            console.log(reject)
                        }
                    })
                    Swal.fire(
                        'Attendace!',
                        'The employee is attendace.',
                        'success'
                    )
                }
            })
        }
    </script>

<script>
        function deleteFunction2(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "the employee is departure !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                size: '100px',
                confirmButtonText: 'Departure!!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('employeeattendace.departure') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id1,
                        },
                        success: (response) => {
                            if (response) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            }
                        },
                        error: function(reject) {
                            console.log(reject)
                        }
                    })
                    Swal.fire(
                        'Departure!',
                        'The employee is departure.',
                        'success'
                    )
                }
            })
        }
    </script>
@include('vue')
    
@endsection
