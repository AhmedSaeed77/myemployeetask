@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('content')

<div class="container" id="types">
    <h1></h1>
    <label class="form-label">Employee Details</label>
    <form class="needs-validation was-validated" id="createEmployee">
        <fieldset class="form-fieldset">
            <div class="mb-3">
                <label class="form-label required">Full name</label>
                <input type="text" v-model="name" name="name" class="form-control" autocomplete="off"/>
            </div>
            <div class="mb-3">
                <label class="form-label required">Employee Number</label>
                <input type="number"  v-model="number"  name="number" class="form-control"  autocomplete="off"/>
            </div>
            <div class="mb-3">
                <label class="form-label required">Employee Date</label>
                <input type="date" v-model="date" name="date" class="form-control"  autocomplete="off"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" v-model="image" name="image" class="form-control" autocomplete="off"/>
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
                name:'',
                number:'',
                date:'',
                image:'',
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
                        this.validation(this.image , ' الصوره مطلوبه ');
                        this.validation(this.date , '  التاريخ مطلوب    ');
                        this.validation(this.number , ' الرقم مطلوب ');
                        this.validation(this.name , ' الاسم مطلوب ');
                    if (this.error.length !== 0) {
                            return false
                        }
                    let formData = new FormData(document.getElementById('createEmployee'));
                    this.load = true;
                    
                    axios.post('{{ route('employee.store') }}', formData).then(response => {
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
                    window.location.href = '{{ route('employee.index' )}}';
                }
            }
        });
		</script>
    
@endsection
