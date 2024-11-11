<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use Illuminate\Http\Request;

class RepairRequestController extends Controller
{
    // แสดงฟอร์มการแจ้งซ่อม (Create Form)
    public function create()
    {
        return view('repair.create');  // ส่งไปที่ view สำหรับกรอกข้อมูล
    }

    // บันทึกข้อมูลการแจ้งซ่อม
    public function store(Request $request)
    {
        // กำหนด validation rules
        $validated = $request->validate([
            'issue' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'reporter' => 'required|string|max:255',
            'internal_phone' => 'required|string|max:20',
            'external_phone' => 'required|string|max:20',
            'remarks' => 'nullable|string',
        ]);

        // บันทึกข้อมูลลงในฐานข้อมูล
        RepairRequest::create($validated);

        // ส่งกลับไปยังหน้าแสดงรายการแจ้งซ่อมพร้อมข้อความแจ้งเตือน
        return redirect()->route('repair.index')->with('success', 'ข้อมูลถูกส่งเรียบร้อยแล้ว!');
    }

    // แสดงรายการแจ้งซ่อม (Show List)
    public function index()
    {
        // ดึงข้อมูลการแจ้งซ่อมทั้งหมดจากฐานข้อมูล
        $requests = RepairRequest::all();  // หรือใช้ paginate() ถ้าต้องการแบ่งหน้า

        // ส่งข้อมูลไปที่ view 'repair.index'
        return view('repair.index', compact('requests'));
    }

    // ฟอร์มแก้ไข
    public function edit($id)
    {
        $request = RepairRequest::findOrFail($id);
        return view('repair.edit', compact('request'));
    }

    // บันทึกการแก้ไข
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'issue' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'reporter' => 'required|string|max:255',
            'internal_phone' => 'required|string|max:20',
            'external_phone' => 'required|string|max:20',
            'remarks' => 'nullable|string',
        ]);

        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->update($validated);

        return redirect()->route('repair.index')->with('success', 'ข้อมูลแจ้งซ่อมถูกแก้ไขแล้ว');
    }

    // ฟังก์ชันลบรายการ
    public function destroy($id)
    {
        // ค้นหารายการที่ต้องการลบ
        $request = RepairRequest::findOrFail($id);

        // ลบรายการ
        $request->delete();

        // ส่งกลับไปที่หน้ารายการพร้อมข้อความแจ้งเตือน
        return redirect()->route('repair.index')->with('success', 'ลบรายการแจ้งซ่อมสำเร็จ');
    }

}
