<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\RoomNumber;
use App\Models\Room;
use App\Models\RoomType;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class RoomController extends Controller
{
    public function EditRoom($id) {

        $basic_facility = Facility::where('room_id', $id)->get();
        $multiimgs = MultiImage::where('room_id', $id)->get();
        $editData = Room::find($id);
        $allroomNo = RoomNumber::where('room_id', $id)->get();
        return view('backend.All_Room.rooms.edit_rooms', compact('editData', 'basic_facility', 'multiimgs', 'allroomNo'));
    }

    public function UpdateRoom(Request $request, $id){

        $room = Room::find($id);
        $room->room_type_id = $room->room_type_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->room_capacity = $request->room_capacity;
        $room->price = $request->price;

        $room->size = $request->size;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->discount = $request->discount;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description;

        //Update single image
        if($request->file('image')){

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::read($image)->resize(550, 850)->save('upload/room_img/' . $name_gen);
            $room['image'] = $name_gen;
        }

        $room->save();

        // Update for Facility Table

        if($request->facility_name == NULL){
            $notification = array (
                'message' => 'Sorry! Not Any Basic Facility Select',
                'alert type' => 'error'
            );

            return redirect()->back()->with($notification);

        } else {
            Facility::where('room_id', $id)->delete();
            $facilities = Count($request->facility_name);
            for($i=0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->room_id = $room->id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->save();
            }
        }

        if($room->save()){
            $files = $request->multi_img;
            if(!empty($files)){
                $subimage = MultiImage::where('room_id', $id)->get()->toArray();
                MultiImage::where('room_id', $id)->delete();
            }
            if(!empty($files)){
                foreach($files as $file){
                    $imgName = date('YmdHi').$file->getClientOriginalName();
                    $file->move('upload/room_img', $imgName);
                    $subimage['multi_img'] = $imgName;

                    $subimage = new MultiImage();
                    $subimage->room_id = $room->id;
                    $subimage->multi_img = $imgName;
                    $subimage->save();
                }
            }
        }
        $notification = array (
            'message' => 'Room Updated Successfully',
            'alert type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function MultiImageDelete($id){

        $deletedata = MultiImage::where('id', $id)->first();

        if($deletedata){

            $imagePath = $deletedata->multi_img;

            // check if the exists before unlink
            if (file_exists($imagePath)){
                unlink($imagePath);
                echo"Image Unlinked Successfully";
            }else{
                echo"Image Does Not Exists";
            }

            // Delete the record from database
            MultiImage::where('id', $id)->delete();
        }

        $notification = array (
            'message' => 'Multi Image Deleted Successfully',
            'alert type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StoreRoomNumber(Request $request, $id) {

        $data = new RoomNumber();
        $data->room_id = $id;
        $data->roomtype_id = $request->roomtype_id;
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->save();

        $notification = array (
            'message' => 'Room Number Added Successfully',
            'alert type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditRoomNumber($id){

        $editroomno = RoomNumber::find($id);
        return view('backend.All_Room.rooms.edit_room_no', compact('editroomno'));
    }

    public function UpdateRoomNumber(Request $request, $id){

        $data = RoomNumber::find($id);
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->save();

        $notification = array (
            'message' => 'Room Number Updated Successfully',
            'alert type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }

    public function DeleteRoomNumber($id){

        RoomNumber::find($id)->delete();
        $notification = array (
            'message' => 'Room Number Deleted Successfully',
            'alert type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }

    public function DeleteRoom(Request $request, $id){
        $room = Room::find($id);

        if(file_exists('upload/room_img/'.$room->image) AND ! empty($room->image)){
            @unlink('upload/room_img/'.$room->image);
        }
        $subimage = MultiImage::where('room_id',$room->id)->get()->toArray();
        if (!empty($subimage)){
            foreach($subimage as $value) {
                if(!empty($value)){
                    @unlink('upload/room_img/'.$value['multi_img']);
                }
            }
        }
        RoomType::where('id', $room->room_type_id)->delete();
        MultiImage::where('room_id', $room->id)->delete();
        Facility::where('room_id', $room->id)->delete();
        RoomNumber::where('room_id', $room->id)->delete();
        $room->delete();

        $notification = array (
            'message' => 'Room Deleted Successfully',
            'alert type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
