
@extends('admin.layouts.master')
@section('header.css')
	<link rel="stylesheet" href="{{ asset('http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}">
	<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
@endsection

@section('content')
	<a class="btn btn-lg btn-info add-modal" style="margin-bottom: 30px" href="" data-toggle="modal" data-target="#create-item"><span class="glyphicon glyphicon-plus"></a>

	<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 1100px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        {{-- <div class="container"> --}}
                        <div style="margin-left:30px;margin-right: 30px">
	                        <div class="portlet-body">
			                  	<div class="row">
			                      	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                          	<div class="form-group">
			                              	<label for="">Name (<span style="color: red">*</span>)</label>
			                              	<input type="text" class="form-control" id="name" placeholder="Name" name="name">
			                              	@if ($errors->has('name'))
			                                  	<span class="errors">{{$errors->first('name')}}</span>
			                              	@endif
			                          	</div>
			                          	<div class="form-group">
			                              	<label for="">Origin Price (<span style="color: red">*</span>)</label>
			                              	<input type="number" class="form-control" id="origin_price" placeholder="Origin Price" name="origin_price">
			                              	@if ($errors->has('origin_price'))
			                                  	<span class="errors">{{$errors->first('origin_price')}}</span>
			                              	@endif
			                          </div>
			                          	<div class="form-group">
			                              	<label for="">Description (<span style="color: red">*</span>)</label>
			                              	<textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Description"></textarea> 
			                             	 @if ($errors->has('description'))
			                                  	<span class="errors">{{$errors->first('description')}}</span>
			                              	@endif
			                          	</div>
                                            {{-- categories --}}
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-list font-green" aria-hidden="true"></i>
                                                    <span class="caption-subject font-green bold">Category</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <select class="form-control category" name="category_id" >
                                                    {{-- <option value=""></option> --}}
                                                  @if (count($categories)>0) @foreach ($categories as $category)
                                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                                  @endforeach @endif
                                                </select>
                                             </div>
                                        </div>
                                        {{-- manufacture --}}
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-list font-green" aria-hidden="true"></i>
                                                    <span class="caption-subject font-green bold">Manufacture</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <select class="form-control manufacture" name="manufacture_id">
                                                    {{-- <option value=""></option> --}}
                                                  @if (count($manufactures)>0) @foreach ($manufactures as $manufacture)
                                                      <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
                                                  @endforeach @endif
                                                </select>
                                             </div>
                                        </div>
			                           	<div class="form-group">
			                                    <label for="">Content (<span style="color: red">*</span>)</label>
			                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Content" class="ckeditor" name="content"></textarea> 
			                                    @if ($errors->has('content'))
			                                        <span class="errors">{{$errors->first('content')}}</span>
			                                    @endif
			                                </div>
			                      		</div>

			                      	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        {{-- content --}}
                                        <div class="form-group">
                                                <label for="">Content (<span style="color: red">*</span>)</label>
                                                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Content" class="ckeditor" name="content"></textarea> 
                                                @if ($errors->has('content'))
                                                    <span class="errors">{{$errors->first('content')}}</span>
                                                @endif
                                            </div>
                                        </div>
			                          
			                      
			                         {{-- image --}}
			                              	
			                          		<img id="holder" name="holder" style="margin-top:15px;max-height:100px;">
			                          {{-- 	</div> --}}
										<div class="input-group">
										   <span class="input-group-btn">
											    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
											       	<i class="fa fa-picture-o"></i> Choose
											    </a>
										   </span>
										   <input id="thumbnail" class="form-control" type="text" name="filepath">
										 </div>
										
											

			                          	{{-- size color quantity --}}
			                          	<div class="alert alert-danger print-error-msg" style="display:none">
								            <ul></ul>
								        </div>
								        <div class="alert alert-success print-success-msg" style="display:none">
								            <ul></ul>
								        </div>
							          
							            <div class="portlet-body " id="divadd">
                                        <table>  
                                            <tr>
                                               <td>Color</td>
                                                <td>Size</td>
                                                <td>Quantity</td>
                                            </tr>
                                            <tr id="row1">
                                                <td>
                                                    <select class="form-control" name="color_id-1[]">
                                                        @if (count($colors)>0) @foreach ($colors as $color)
                                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                                        @endforeach 
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="size_id-1[]">
                                                        @if (count($sizes)>0) @foreach ($sizes as $size)
                                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                                        @endforeach 
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity-1" class="form-control" style="width:100px">
                                                </td>
                                                <td><p class="btn btn-primary" id="addabc">+</p></td>
                                             
                                            </tr>
                                            
                                        </table>
                                    </div>
							           {{--  <div>
							            	 <input type="checkbox" class="published" data-id="" checked="">
							            </div> --}}	
			                      	</div>
			                  	</div>
			              
	          				</div>
	                        </div>
	                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal" id="submit">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Modal form to show all product detail -->
    <div id="showModal" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover"  id="productlist-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal form to edit a product -->
 
	<table class="table table-hover" id="products-table">

		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Description</th>
				<th>Origin_price</th>
				<th>Created_at</th>
				<th>Action</th>
			</tr>
		</thead>
	</table>
		
@endsection
@section('footer.js')
	<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
  	<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
  	
  <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
     <script type="text/javascript">
	 	$('#lfm').filemanager('image');
	 </script>
	{{-- <script type="text/javascript" src="{{ asset('js/product.js') }}"></script> --}}
	<script>
		$(function() {
			// datatable laravel
		    var colorTable = $('#products-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('product.anydata') !!}',
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'name', name: 'name' },
		            { data: 'slug', name: 'slug' },
		            { data: 'description', name: 'description' },
		            { data: 'origin_price', name: 'origin_price' },
		            { data: 'created_at', name: 'created_at' },
		            { data: 'action', name: 'action' }
		        ]
		    });

		    // add a product

		    $(document).on('click', '.add-modal', function() {
                $('.modal-title').text('Add');
                $('#addModal').modal('show');
            });
            $('.modal-footer').on('click', '.add', function() {

              
               	 
                var description = jQuery("textarea#description").val();
                var selectedCategory = $(".category option:selected").val();
                var selectedManufacture = $(".manufacture option:selected").val();
                var selectedSize = $(".size option:selected").val();
                var selectedColor = $(".color option:selected").val();
                // var content = CKEDITOR.instances.content.getData();
                var content = tinymce.get("content").getContent();
                // ->getClientOriginalExtension()
               
                console.log($('#thumbnail').val());

                $.ajax({
                    type: 'POST',
                    url: '{{ route('product.store') }}',
                    data: {
                        _token: $('input[name=_token]').val(),
                        name: $('#name').val(),
                        image: $('#thumbnail').val(),
                        description: description,
                        content:content,
                        origin_price:$('#origin_price').val(),
                        quantity:$('#quantity').val(),
                        category_id : selectedCategory,
                        manufacture_id : selectedManufacture,
                        size_id : selectedSize,
                        color_id : selectedColor,
                    },
                    success: function(data) {
                        $('.errorName').addClass('hidden');
                        $('.errorDescription').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#addModal').modal('show');
                                toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                            }, 500);

                            if (data.errors.name) {
                                $('.errorName').removeClass('hidden');
                                $('.errorName').text(data.errors.name);
                            }
                            if (data.errors.description) {
                                $('.errorDescription').removeClass('hidden');
                                $('.errorDescription').text(data.errors.description);
                            }
                        } else {
                            toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                            colorTable.ajax.reload();
                        }
                    },
                });
            });
            // show detail product
             $(document).on('click', '.show-modal', function() {
                $('.modal-title').text('Show');
                $('#showModal').modal('show');

                var id = $(this).attr('data-id');
                console.log(id);
                var url = '{{ asset('admin/product') }}'+'/' + id +'/anydataListProduct';
                $('#productlist-table').DataTable({
                	
                    processing: true,
                    serverSide: true,
                    "destroy": true,
                    ajax: url,
                    columns: [ 
                        { data: 'id', name: 'id' },
                        { data: 'size.size', name: 'size' },
                        { data: 'color.code', name: 'color' },
                        { data: 'quantity', name: 'quantity' },
                        { data: 'created_at', name: 'created_at' },
                    ]
                });
            });
             // edit product
              $('#category-table').on('click', '.edit-modal', function(e){
                e.preventDefault();
            });

            $(document).on('click', '.edit-modal', function() {
                $('.modal-title').text('Edit');
                $('#editModal').modal('show');
                var id = $(this).attr('data-id');
               	var description = jQuery("textarea#description_edit").val();
                var content = tinymce.get("content_edit").getContent();
                var selectedCategory = $("#category_id_edit option:selected").val();
                var selectedManufacture = $("#manufacture_id_edit  option:selected").val();
                var selectedSize = $("#size_edit option:selected").val();
                var selectedColor = $("#color_edit option:selected").val();
                var url = '{{ asset('admin/product/edit') }}'+'/' + id;


                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response){
                        $('#name_edit').val(response.name); 
                        $('#thumbnail_edit').val(response.image); 
                        $('#origin_price_edit').val(response.name); 
                        $(description).val(response.description); 
                        $(selectedCategory).val(response.category); 
                        $(selectedManufacture).val(response.manufacture); 
                        $(selectedSize).val(response.size); 
                        $(selectedColor).val(response.color); 
                        $(description).val(response.description); 
                       tinymce.get("edit_textarea_content").setContent(response.content);
                        
                    }
                })

                $('.modal-footer').on('click', '.edit', function() {

                    var content = tinymce.get("edit_textarea_content").getContent();

                    var url = '{{ asset('admin/category/update') }}'+'/' + id;
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            _token: $('input[name=_token]').val(),
                            name: $('#name_edit').val(),
                            description: content,
                        },
                        success: function(data) {
                            $('.errorName').addClass('hidden');
                            $('.errorDescription').addClass('hidden');

                            if ((data.errors)) {
                                setTimeout(function () {
                                    $('#editModal').modal('show');
                                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                                }, 500);

                                if (data.errors.name) {
                                    $('.errorName').removeClass('hidden');
                                    $('.errorName').text(data.errors.name);
                                }
                                if (data.errors.description) {
                                    $('.errorDescription').removeClass('hidden');
                                    $('.errorDescription').text(data.errors.description);
                                }
                            } else {
                                toastr.success('Successfully edit Category!', 'Success Alert', {timeOut: 5000});
                                colorTable.ajax.reload();
                            }
                        },
                    });
                });
           
            });

             // delete product
          	$('#products-table').on('click', '.delete', function(e){
                e.preventDefault();
            });
            $('#products-table').on('click', '.btn-danger', function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                var url = '{{ asset('admin/product/delete') }}'+'/' + id;
                swal({
                  dangerMode: true,
                  title: "Bạn có muốn xóa viết này không?",
                  icon: "warning",
                  buttons: {
                    cancel: 'Hủy',
                    confirm: 'Xóa'
                  }
                })
                .then((willDelete) => {
                    if (willDelete) {
                       
                        $.ajax({
                            type: "delete",
                            url: url,
                            data: {
                                product_id : id,
                            },
                            success: function(res)
                            {
                                if(!res.error) {
                                     
                                    toastr.success('Sản Phẩm đã được xóa!');
                                    colorTable.ajax.reload();   
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.error(thrownError);

                            }
                        });
                    } else {
                        swal("Bạn đã hủy xóa bài viết!");
                    }
                });

       
            });
		});
	</script>
	<script type="text/javascript">
		var i=1;  
         $('#addabc').click(function(){  
           i++;  
           $('#divadd').append(' <table ><tr class="dynamic-added" id="'+i+'"><td>Color</td><td>Size</td><td>Quantity</td></tr><tr class="addProduct"><td><select class="form-control" name="color_id-'+i+'">@if (count($colors)>0) @foreach ($colors as $color)<option value="{{$color->id}}">{{$color->name}}</option>@endforeach @endif </select></td><td><select class="form-control" name="size_id-'+i+'">@if (count($sizes)>0) @foreach ($sizes as $size)<option value="{{$size->id}}">{{$size->size}}</option>@endforeach @endif </select></td><td><input type="number" name="quantity-'+i+'" class="form-control" style="width:100px"></td><td><button type="button" name="remove" class="btn btn-danger btn_remove1" id="remove-tr'+i+'" data-id="'+i+'"><span class="glyphicon glyphicon-minus" id="remove-tr'+i+'"></span></button></td></tr></table>');  

        });



        $(document).on('click', '.btn_remove1', function(){  
            console.log("");
            $(this).parents('table').remove(); 
        });
	</script>



	<script>

	    tinymce.init({
	    selector: '#content',
	    height: 200,
	    theme: 'modern',
	    menubar: false,
	    autosave_ask_before_unload: false,
	    plugins: [
	      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	      "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern codesample"
	    ],
	    toolbar1: "newdocument | forecolor backcolor cut copy paste bullist numlist bold italic underline strikethrough| alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect  | searchreplace  | outdent indent | undo redo | link unlink anchor code | insertdatetime preview | table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | codesample",
	    image_advtab: true,
	    content_css: [
	      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	      '//www.tinymce.com/css/codepen.min.css'
	    ],
	    setup: function (ed) {
	        ed.on('init', function (e) {
	            ed.execCommand("fontName", false, "Tahoma");
	        });
	    },
	    relative_urls: false,
	    remove_script_host : false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = route_prefix + 'laravel-filemaneger?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Image manager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	   });

	    $('#post-create').on('keyup keypress', function(e) {
	      var keyCode = e.keyCode || e.which;
	      if (keyCode === 13) { 
	        e.preventDefault();
	        return false;
	      }
	    });
	</script>
@endsection