<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
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

        $room_type_id = RoomType::insertGetId([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        Room::insert([
            'room_type_id' => $room_type_id,
        ]);
        $notification = array(
            'message' => 'Room Type Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }
}
