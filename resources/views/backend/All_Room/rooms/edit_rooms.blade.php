@extends('admin.admin_dashboard')
@section('admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">

                                        <div class="tab-title"><i class="fa-solid fa-bed"></i>   Manage Room</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">

                                        <div class="tab-title"><i class="fa-solid fa-hashtag"></i>    Room Number</div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                <div class="col-xl-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <h5 class="mb-4">Update Room</h5>
                                            <form class="row g-3" action="{{ route('update.room', $editData->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-4">
                                                    <label for="input1" class="form-label">Room Type Name</label>
                                                    <input type="text" name="room_type_id" class="form-control" id="input1" value="{{ isset($editData['type']) && isset($editData['type']['name']) ? $editData['type']['name'] : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Total Adult</label>
                                                    <input type="text" name="total_adult" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->total_adult) ? $editData->total_adult : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Total Child</label>
                                                    <input type="text" name="total_child" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->total_child) ? $editData->total_child : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input1" class="form-label">Room Price</label>
                                                    <input type="text" name="price" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->price) ? $editData->price : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Discount ( % )</label>
                                                    <input type="text" name="discount" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->discount) ? $editData->discount : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Room Capacity</label>
                                                    <input type="text" name="room_capacity" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->room_capacity) ? $editData->room_capacity : '' }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input7" class="form-label">Room View</label>
                                                    <select name="view" id="input7" class="form-select">
                                                        <option value="Pool View" {{ $editData->view == 'Pool View'?'selected':'' }}>Pool View</option>
                                                        <option value="Beach View" {{ $editData->view == 'Beach View'?'selected':'' }}>Beach View</option>
                                                        <option value="Sea View" {{ $editData->view == 'Sea View'?'selected':'' }}>Sea View</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input7" class="form-label">Bed Style</label>
                                                    <select name="bed_style" id="input7" class="form-select">
                                                        <option value="One Bed" {{ $editData->bed_style == 'One Bed'?'selected':'' }}>One Bed</option>
                                                        <option value="Two Bed" {{ $editData->bed_style == 'Two Bed'?'selected':'' }}>Two Bed</option>
                                                        <option value="Three Bed" {{ $editData->bed_style == 'Three Bed'?'selected':'' }}>Three Bed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Size</label>
                                                    <input type="text" name="size" class="form-control" id="input2"
                                                        value="{{ isset($editData) && isset($editData->size) ? $editData->size : '' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="input3" class="form-label">Main Image</label>
                                                    <input type="file" name="image" class="form-control" id="image">
                                                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/room_img/'.$editData->image) :
                                                    url('upload/no_image.jpg') }}" alt="Admin" class="bg-primary" width="80"  height="70">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="input4" class="form-label">Gallery Image</label>
                                                    <input type="file" name="multi_img[]" class="form-control" multiple id="multiImg" accept="image/jpeg, image/jpg, image/gif, image/png">

                                                    @foreach ($multiimgs as $item)
                                                    <img src="{{ (!empty($item->multi_img)) ? url('upload/room_img/multi_img/'.$item->multi_img) : url('upload/no_image.jpg') }}" alt="Admin"
                                                    class="bg-primary" width="80" height="70">
                                                    <a href="{{ route('multi.image.delete', $item->id) }}"><i class="fa-regular fa-circle-xmark"></i></a>
                                                    @endforeach
                                                    <div class="row" id="preview_img"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="input11" class="form-label">Short Description</label>
                                                    <textarea name="short_desc" class="form-control" id="input11" rows="4">{{ $editData->short_desc }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="input11" class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" id="input11" rows="4">{{ $editData->description }}</textarea>
                                                </div>
                                                <div class="row pt-10 mt-10">
                                                        <div class="col-md-12 mb-10">
                                                            <label for="facility_name" class="form-label"><b>Add Room Facility </b> </label>
                                                        @forelse ($basic_facility as $item)
                                                        {{-- If there have existing data, so that is existing data will be executed --}}
                                                        <div class="basic_facility_section_remove" id="basic_facility_section_remove" style="padding-top: 5px;">
                                                            <div class="row add_item">
                                                                <div class="col-md-6">
                                                                    <select name="facility_name[]" id="facility_name" class="form-control">
                                                                        <option value="">Select Facility</option>
                                                                        <option value="Minibar" {{$item->facility_name == 'Complimentary Breakfast'?'selected':''}}> Minibar</option>
                                                                        <option value="Work Desk"  {{$item->facility_name == 'Work Desk'?'selected':''}}>Work Desk</option>
                                                                        <option value="Free Wi-Fi" {{$item->facility_name == 'Free Wi-Fi'?'selected':''}}>Free Wi-Fi</option>
                                                                        <option value="Boat Transfer" {{ $item->facility_name == 'Boat Transfer' ? 'selected' : '' }}>Boat Transfer</option>
                                                                        <option value="In Room Bathtub" {{ $item->facility_name == 'In Room Bathtub' ? 'selected' : '' }}>In Room Bathtub</option>
                                                                        <option value="Free Breakfast" {{ $item->facility_name == 'Free Breakfast' ? 'selected' : '' }}>Free Breakfast</option>
                                                                        <option value="Laundry and Dry Cleaning" {{$item->facility_name == 'Laundry and Dry Cleaning'?'selected':''}} >Laundry and Dry Cleaning</option>
                                                                </select>
                                                                </div>
                                                                <div class="form-group col-md-6" >
                                                                    <span class="btn addeventmore btn-outline-success radius-10" id="plus" style="margin-right: 16px;"><i class="fa-solid fa-plus"></i></span>
                                                                    <span class="btn removeeventmore btn-outline-danger radius-10" id="minus"><i class="fa-solid fa-minus"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @empty

                                                        <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                                                            <div class="row add_item">
                                                                <div class="col-md-6">
                                                                    <select name="basic_facility_name[]" id="basic_facility_name" class="form-control">
                                                                    <option value="">Select Facility</option>
                                                                    <option value="Minibar">Minibar</option>
                                                                    <option value="Work Desk" >Work Desk</option>
                                                                    <option value="Free Wi-Fi">Free Wi-Fi</option>
                                                                    <option value="Boat Transfer" >Boat Transfer</option>
                                                                    <option value="In Room Bathtub" >In Room Bathtub</option>
                                                                    <option value="Laundry and Dry Cleaning" >Laundry and Dry Cleaning</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6" >
                                                                    <a class="btn addeventmore btn-outline-success radius-10" id="plus" style="margin-right: 16px;"><i class="fa-solid fa-plus"></i></a>
                                                                    <a class="btn removeeventmore btn-outline-danger radius-10" id="minus"><i class="fa-solid fa-minus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforelse
                                                    </div>
                                                    </div>
                                                    <br>
                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <button type="submit" class="btn px-3" style="border: 2px solid #1e75d6;">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- End Primary Home --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <a class="card-title float-right mb-16px" onclick="addRoomNo()" id="addRoomNo">
                                    <button type="submit" class="btn btn-outline-primary" style="margin-top: 28px">Add New</button>
                                </a>
                                <div class="roomnoHide" id="roomnoHide">
                                    <form action="{{ route('store.room.no', $editData->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="roomtype_id" value="{{ $editData->room_type_id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="input2" class="form-label">Room Number</label>
                                                <input type="text" name="room_no" class="form-control" id="input2">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="input7" class="form-label">Status</label>
                                                <select name="status" id="input7" class="form-select">
                                                    <option selected="">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-outline-primary" style="margin-top: 28px">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table mb-0 table-hover" id="roomview">
									<thead>
										<tr>
											<th scope="col">Room Number</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($allroomNo as $item)
                                        <tr>
											<td>{{ $item->room_no }}</td>
											<td>{{ $item->status }}</td>
											<td>
                                                <a href="{{ route('edit.roomno', $item->id) }}" class="btn btn-outline-success px-3 radius-10" id="edit" style="margin-right: 16px;">Edit</a>

                                                <a href="{{ route('delete.roomno', $item->id) }}" class="btn btn-outline-danger px-3 radius-10" id="delete">Delete</a>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
<!--------===Show MultiImage ========------->
<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new file reader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>
{{-- Facilities--}}
<div style="visibility: hidden">
<div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="basic_facility_section_remove" id="basic_facility_section_remove">
        <div class="container mt-2">
            <div class="row">
            <div class="form-group col-md-6">
                <select name="facility_name[]" id="basic_facility_name" class="form-control">
                        <option value="">Select Facility</option>
                        <option value="Minibar"> Minibar</option>
                        <option value="Work Desk">Work Desk</option>
                        <option value="Free Wi-Fi">Free Wi-Fi</option>
                        <option value="Boat Transfer">Boat Transfer</option>
                        <option value="In Room Bathtub">In Room Bathtub</option>
                        <option value="Free Breakfast">Free Breakfast</option>
                        <option value="Laundry and Dry Cleaning">Laundry and Dry Cleaning</option>
                    </select>
                </div>
                <div class="form-group col-md-6" style="padding-top: 20px">
                    <span class="addeventmore"><i class="lni lni-circle-plus"></i></span>
                    <span class="removeeventmore"><i class="lni lni-circle-minus"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    var counter = 0;
    $(document).on("click",".addeventmore",function(){
        var whole_extra_item_add = $("#whole_extra_item_add").html();
        $(this).closest(".add_item").append(whole_extra_item_add);
        counter++;
    });
    $(document).on("click",".removeeventmore",function(event){
            $(this).closest("#basic_facility_section_remove").remove();
            counter -= 1
    });
    });
</script>
{{-- End of Facilities--}}
<script>
    $('#roomnoHide').hide();
    $('#roomview').show();

    function addRoomNo(){
        $('#roomnoHide').show();
        $('#roomview').hide();
        $('#addRoomNo').hide();
    }
</script>
@endsection
