@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')

<div class="container" id="types">
    <h1></h1>
    <div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>Start</th>
                <th> End</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($works as $work)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $work->start }}</td>
                    <td>{{ $work->end }}</td>
                </tr>
            @endforeach
    </table>
</div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function deleteFunction(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                size: '100px',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('employee.delete') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id1,
                        },
                        success: (response) => {
                            if (response) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'success deleted',
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
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@include('vue')


    
@endsection
