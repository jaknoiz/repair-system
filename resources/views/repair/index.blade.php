<!-- resources/views/repair/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">รายการแจ้งซ่อม</h1>

        <!-- แสดงข้อความแจ้งเตือนหากส่งข้อมูลสำเร็จ -->
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- ตารางแสดงรายการแจ้งซ่อม -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>วันที่ส่งข้อมูล</th>
                        <th>เรื่อง</th>
                        <th>วิทยาเขต</th>
                        <th>ผู้แจ้ง</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $request->issue }}</td>
                            <td>{{ $request->campus }}</td>
                            <td>{{ $request->reporter }}</td>
                            <td>
                                <a href="{{ route('repair.edit', $request->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>

                                <!-- ปุ่มลบ -->
                                <form action="{{ route('repair.destroy', $request->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ปุ่มกลับไปยังฟอร์มกรอกข้อมูล -->
        <div class="text-center mt-4">
            <a href="{{ route('repair.create') }}" class="btn btn-primary">กรอกข้อมูลแจ้งซ่อมใหม่</a>
        </div>
    </div>
@endsection
