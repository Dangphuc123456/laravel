<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User\Booking as UserBooking;

class BookingController extends Controller
{
    public function index()
    {
        $bk = UserBooking::paginate(15);
        return view('admin.booking.index', compact('bk'));
    }
}
