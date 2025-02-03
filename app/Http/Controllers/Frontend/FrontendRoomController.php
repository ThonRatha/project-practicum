<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Room;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class FrontendRoomController extends Controller
{
    public function AllFrontendRoomList() {

        $rooms = Room::latest()->get();
        return view('frontend.room.all_rooms', compact('rooms'));
    }
    public function RoomDetailsPage($id){

        $roomdetails = Room::find($id);
        $multiImage = MultiImage::where('room_id', $id)->get();
        $facility = Facility::where('room_id', $id)->get();

        $otherRooms = Room::where('id','!=', $id)->orderBy('id', 'DESC')->limit(4)->get();
        return view('frontend.room.room_details', compact('roomdetails', 'multiImage', 'facility', 'otherRooms'));
    }
    public function BookingSearch(Request $request){

        $request->flash();

        if($request->check_in == $request->check_out){
            $notification = array(
                'message' => 'Something went Wrong',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $sdate = date('Y-m-d', strtotime($request->check_in));
        $edate = date('Y-m-d', strtotime($request->check_out));
        $alldate = Carbon::create($edate)->subDay();
        $d_period = CarbonPeriod::create($sdate, $alldate);
    }
}
