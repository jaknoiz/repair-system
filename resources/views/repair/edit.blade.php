<!-- resources/views/repair/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขข้อมูลการแจ้งซ่อม</h1>

        <!-- แสดงข้อความแจ้งเตือนหากส่งข้อมูลสำเร็จ -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ฟอร์มการแก้ไขข้อมูลการแจ้งซ่อม -->
        <form action="{{ route('repair.update', $request->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="issue">เรื่อง:</label>
                <input type="text" name="issue" id="issue" class="form-control" value="{{ old('issue', $request->issue) }}" required>
            </div>

            <div class="form-group">
                <label for="campus">วิทยาเขต:</label>
                <select name="campus" id="campus" class="form-control" required>
                    <option value="A" {{ $request->campus == 'A' ? 'selected' : '' }}>วิทยาเขต พัทลุง</option>
                    <option value="B" {{ $request->campus == 'B' ? 'selected' : '' }}>วิทยาเขต สงขลา</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reporter">ผู้แจ้ง:</label>
                <input type="text" name="reporter" id="reporter" class="form-control" value="{{ old('reporter', $request->reporter) }}" required>
            </div>

            <div class="form-group">
                <label for="internal_phone">เบอร์โทรภายใน:</label>
                <input type="text" name="internal_phone" id="internal_phone" class="form-control" value="{{ old('internal_phone', $request->internal_phone) }}" required>
            </div>

            <div class="form-group">
                <label for="external_phone">โทรศัพท์มือถือหรือเบอร์โทรภายนอก:</label>
                <input type="text" name="external_phone" id="external_phone" class="form-control" value="{{ old('external_phone', $request->external_phone) }}" required>
            </div>

            <div class="form-group">
                <label for="remarks">หมายเหตุ:</label>
                <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks', $request->remarks) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </form>

        <!-- ปุ่มย้อนกลับไปหน้ารายการแจ้งซ่อม -->
        <div class="text-center mt-3">
            <a href="{{ route('repair.index') }}" class="btn btn-secondary">ย้อนกลับไปหน้ารายการ</a>
        </div>
    </div>
@endsection
