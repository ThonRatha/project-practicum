<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;


class RoomTypeController extends Controller
{
    public function RoomTypeList() {
        $allData = RoomType::orderBy('id', 'desc')->get();
        return view('backend.All_Room.room_type.view_room_type', compact('allData'));
    }

    public function AddRoomType() {
        return view('backend.All_Room.room_type.add_room_type');
    }

    public function RoomTypeStore(Request $request) {

        RoomType::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Room Type Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }
}
