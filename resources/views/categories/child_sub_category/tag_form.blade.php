


<!-- Add Customer -->
<div class="modal fade" id="TagSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('chilTag.store')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-11">
                        <!--start Name-->
                        <div class="input-group">
                            <label for="name" class="col-md-3 col-form-label text-md-left">Tag Name</label>
                            <input type="text" class="form-control" placeholder="Tag Name"  name="name" required>
                            <input type="text" class="form-control" style="display: none" value="tag_sub_cat_name"  name="tag_sub_name" required>
                        </div>
                        @php
                            $subcategory=DB::table('sub_categories')->get();
                        @endphp
                        <!--start Name-->
                        <div class="input-group">
                            <label for="name" class="col-md-3 col-form-label text-md-left">Sub Category</label>
                            <select type="text" class="form-control" name="sub_category_id" required>
                                 <option value="">Select Category Name</option>
                                @foreach($subcategory as $subcategory_name)
                                 <option value="{{$subcategory_name->id}}">{{$subcategory_name->name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addTagSubCategory">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>