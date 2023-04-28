@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('content')

<div class="container" id="types">
    <h1></h1>
    <label class="form-label">Work Details</label>
    <form class="needs-validation was-validated" id="creatework">
        <fieldset class="form-fieldset">
            <div class="mb-3">
                <label class="form-label required">Start</label>
                <input type="date" v-model="start" name="start" class="form-control"  autocomplete="off"/>
            </div>
            <div class="mb-3">
                <label class="form-label required">End</label>
                <input type="date" v-model="end" name="end" class="form-control"  autocomplete="off"/>
            </div>
        </fieldset>
        <button type="submit" @click="saveData" class="btn btn-primary mt-3 mb-0">save</button>
    </form>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
@include('vue')

    <script>
			content = new Vue({
            'el': '#types',
            data: {
                start:'',
                end:'',
                error:[]
            },
            methods: {
                validation:function(el , msg){
                    if(el == ''){
                        this.error.push({
                            'err' : 'err'
                        });
                        swal({
                                title:  msg,
                                type: 'warning',
                                confirmButtonText: 'موافق',
                            });
                        return 0;
                    }
                },
                saveData: function(e) {
                    e.preventDefault();
                        this.error = []
                        this.validation(this.end , ' تاريخ الانتهاء مطلوب');
                        this.validation(this.start , '  تاريخ البدايه مطلوب');
                    if (this.error.length !== 0) {
                            return false
                        }
                    let formData = new FormData(document.getElementById('creatework'));
                    this.load = true;
                    
                    axios.post('{{ route('work.store') }}', formData).then(response => {
                        console.log(response)
                        if (response.data.err == true) {
                            swal({
                                title: response.data.msg,
                                type: 'warning',
                                confirmButtonText: 'موافق',
                            });
                        } else {
                            swal({
                                title: response.data.msg,
                                type: 'success',
                                confirmButtonText: 'موافق',
                            });
                            this.load = false;
                        }
                    }).catch(response => {
                        swal({
                            title: response.response.message,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                    })
                    window.location.href = '{{ route('work.index' )}}';
                }
            }
        });
		</script>
    
@endsection
