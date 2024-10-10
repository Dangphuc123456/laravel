<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller
{
    public function showForm()
    {
        return view('user.booking'); // Adjusted to match the new location
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'guest_count' => 'required|integer|min:1',
            'location' => 'required|string',
        ]);

        // Tạo bản ghi mới trong bảng booking
        Booking::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'guest_count' => $validatedData['guest_count'],
            'location' => $validatedData['location'],
            'status' => 'Đã đặt bàn',
        ]);

        return redirect()->back()->with('success', 'Đặt bàn thành công!');
    }
}
