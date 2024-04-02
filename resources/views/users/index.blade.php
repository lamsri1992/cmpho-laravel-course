@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-end" style="margin-bottom: 1rem;">
                        <!-- Button trigger modal -->
                        <br>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createUser">
                            <i class="fa-solid fa-user-plus"></i>
                            เพิ่มผู้ใช้งาน
                        </button>
                    </div>
                    <table id="tableBasic" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>EDIT</th>
                                <th class="text-center">DELETE</th>
                            </tr>
                        </thead>
                        {{-- Loop --}}
                        <tbody>
                            @foreach($data as $res)
                                <tr>
                                    <td>{{ $res->id }}</td>
                                    <td>{{ $res->name }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td>
                                        <a href="{{ route('user.show',$res->id) }}">
                                            <i class="fa-solid fa-edit"></i>
                                            แก้ไขข้อมูล
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('user.delete',$res->id) }}">
                                            <button type="button" class="btn btn-danger btn-xs"
                                            onclick="Swal.fire({
                                                title: 'ยืนยันการลบผู้ใช้งาน ?',
                                                showCancelButton: true,
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    form.submit();
                                                }
                                            });"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                                ลบ
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- End - Loop --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createUserLabel">
                        เพิ่มผู้ใช้งาน
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection
@section('script')

@endsection
