<!-- resources/views/repair/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ฟอร์มกรอกข้อมูลแจ้งซ่อม</h1>

        <!-- ฟอร์มกรอกข้อมูลการแจ้งซ่อม -->
        <form action="{{ route('repair.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="issue">เรื่อง:</label>
                <input type="text" name="issue" id="issue" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="campus">วิทยาเขต:</label>
                <select name="campus" id="campus" class="form-control" required>
                    <option value="A">วิทยาเขต พัทลุง</option>
                    <option value="B">วิทยาเขต สงขลา</option>
                </select>
            </div>

            <div class="form-group">
                <label for="reporter">ผู้แจ้ง:</label>
                <input type="text" name="reporter" id="reporter" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="internal_phone">เบอร์โทรภายใน:</label>
                <input type="text" name="internal_phone" id="internal_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="external_phone">โทรศัพท์มือถือหรือเบอร์โทรภายนอก:</label>
                <input type="text" name="external_phone" id="external_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="remarks">หมายเหตุ:</label>
                <textarea name="remarks" id="remarks" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
        </form>

        <!-- ปุ่มย้อนกลับไปหน้ารายการแจ้งซ่อม -->
        <div class="text-center mt-3">
            <a href="{{ route('repair.index') }}" class="btn btn-secondary">ย้อนกลับไปหน้ารายการ</a>
        </div>
    </div>
@endsection
