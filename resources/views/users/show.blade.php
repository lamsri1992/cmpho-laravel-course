@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <br>
                    <form action="{{ route('user.update',$data->id) }}" method="POST">
                        @csrf
                        <div class="">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="username" required value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary"
                                onclick="Swal.fire({
                                    title: 'ยืนยันการเพิ่มผู้ใช้งาน ?',
                                    showCancelButton: true,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    }
                                });"
                                >
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
