<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function EditRoom($id) {

        $editData = Room::find($id);
        return view('backend.All_Room.rooms.edit_rooms', compact('editData'));
    }
}
