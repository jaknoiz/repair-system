@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">รายละเอียดการแจ้งซ่อม</h1>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>รหัสการแจ้งซ่อม:</strong> {{ $request->id }}</p>
                <p><strong>วันที่ส่งข้อมูล:</strong> {{ $request->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>เรื่อง:</strong> {{ $request->issue }}</p>
                <p><strong>วิทยาเขต:</strong> {{ $request->campus }}</p>
                <p><strong>ผู้แจ้ง:</strong> {{ $request->reporter }}</p>
                <p><strong>เบอร์โทรภายใน:</strong> {{ $request->internal_phone }}</p>
                <p><strong>เบอร์โทรภายนอก:</strong> {{ $request->external_phone }}</p>
                <p><strong>หมายเหตุ:</strong> {{ $request->remarks }}</p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('repair.index') }}" class="btn btn-secondary">กลับไปยังรายการแจ้งซ่อม</a>
        </div>
    </div>
@endsection
