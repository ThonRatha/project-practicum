<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookArea;
use Illuminate\Http\Request;
use App\Models\Team;
use Intervention\Image\Laravel\Facades\Image;
use Carbon\Carbon;

class TeamController extends Controller
{
    public function AllTeam()
    {

        $team = Team::latest()->get();
        return view('backend.team.all_team', compact('team'));
    } // End Method

    public function AddTeam()
    {
        return view('backend.team.add_team');
    } // End Method

    public function StoreTeam(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::read($image)->resize(550, 670)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Team::insert([

            'name' => $request->name,
            'position' => $request->position,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // message notification
        $notification = array(
            'message' => 'Team Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    } // End Method

    public function EditTeam($id) {
        $team = Team::findOrFail($id);
        return view('backend.team.edit_team', compact('team'));
    }

    public function UpdateTeam(Request $request) {
        $team_id = $request->id;

        if($request->file('image')) {
            $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::read($image)->resize(550, 670)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Team::findOrFail($team_id)->update([

            'name' => $request->name,
            'position' => $request->position,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        // message notification
        $notification = array(
            'message' => 'Team Updated with Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);

    } else {

        Team::findOrFail($team_id)->update([

            'name' => $request->name,
            'position' => $request->position,
            'created_at' => Carbon::now(),
        ]);

        // message notification
        $notification = array(
            'message' => 'Team Updated without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
        }
    }

    public function DeleteTeam($id) {
        $item = Team::findOrFail($id);
        $img = $item->image;

        // Check if the file exists before deleting
        if (file_exists(public_path($img))) {
            unlink(public_path($img));
        } else {
            // Log or handle the case where the file does not exist
            error_log("File not found: " . public_path($img));
        }

        // Continue with the rest of the deletion logic (e.g., database entry deletion)
        $item->delete();

        $notification = array(
            'message' => 'Team Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.team')->with($notification);
    }

    //=========== Book Area Method ============
    public function BookArea() {

        $book= BookArea::find(1);
        return view('backend.Bookarea.book_area', compact('book'));
    }// End Method

    public function BookAreaUpdate(Request $request) {
        $book_id = $request->id;
        if($request->file('image')) {
            $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::read($image)->resize(1000, 1000)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        BookArea::findOrFail($book_id)->update([

            'short_title' => $request->short_title,
            'main_title' => $request->main_title,
            'short_desc' => $request->short_desc,
            //'link_url' => $request->link_url,
            'image' => $save_url,
        ]);

        // message notification
        $notification = array(
            'message' => 'Book Area Updated Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } else {

        BookArea::findOrFail($book_id)->update([

            'short_title' => $request->short_title,
            'main_title' => $request->main_title,
            'short_desc' => $request->short_desc,
            //'link_url' => $request->link_url,

        ]);
        // message notification
        $notification = array(
            'message' => 'Book Area Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
}
