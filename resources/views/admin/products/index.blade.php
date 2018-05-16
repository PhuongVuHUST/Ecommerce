@extends('admin.layouts.master')
@section('header.css')
	<link rel="stylesheet" href="{{ asset('http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}">
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
			                              	<label for="">Status (<span style="color: red">*</span>)</label>
			                              	<input type="text" class="form-control" id="status" placeholder="Status" name="status">
			                              	@if ($errors->has('status'))
			                                  	<span class="errors">{{$errors->first('status')}}</span>
			                              	@endif
			                          </div>
			                          	<div class="form-group">
			                              	<label for="">Description (<span style="color: red">*</span>)</label>
			                              	<textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Description"></textarea> 
			                             	 @if ($errors->has('description'))
			                                  	<span class="errors">{{$errors->first('description')}}</span>
			                              	@endif
			                          	</div>
			                           	<div class="form-group">
			                                    <label for="">Content (<span style="color: red">*</span>)</label>
			                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Content" class="ckeditor" name="editor"></textarea> 
			                                    @if ($errors->has('content'))
			                                        <span class="errors">{{$errors->first('content')}}</span>
			                                    @endif
			                                </div>
			                      		</div>

			                      	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			                          
			                          {{-- categories --}}
			                          	<div class="portlet light bordered">
			                              	<div class="portlet-title">
			                                  	<div class="caption">
			                                      	<i class="fa fa-list font-green" aria-hidden="true"></i>
			                                      	<span class="caption-subject font-green bold">Category</span>
			                                  	</div>
			                              	</div>
			                              	<div class="portlet-body">
			                                  	<select class="form-control" name="category_id">
			                                  		<option value=""></option>
			                                     {{--  @if (count($categories)>0) @foreach ($categories as $category)
			                                          <option value="{{$category->id}}">{{$category->name}}</option>
			                                      @endforeach @endif --}}
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
			                                  	<select class="form-control" name="manufacture_id">
			                                  		<option value=""></option>
			                                      {{-- @if (count($manufactures)>0) @foreach ($manufactures as $manufacture)
			                                          <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
			                                      @endforeach @endif --}}
			                                  	</select>
			                             	 </div>
			                          	</div>
			                          {{-- featured image  --}}
			                          	<div class="portlet light bordered">
			                              	<div class="portlet-title">
			                                  	<div class="caption">
			                                      	<i class="fa fa-picture-o font-green" aria-hidden="true"></i>
			                                      	<span class="caption-subject font-green bold">Image</span>
			                                  	</div>
			                              	</div>
			                              	<div class="portlet-body">
			                                   	<div class="fileinput fileinput-new" data-provides="fileinput">
			                                      	<div class="fileinput-new thumbnail" style="width: 250px; height: 200px;">
			                                          	<img id="previewimg" src="" alt="No Image" /> </div>
			                                      	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 200px;"> </div>
			                                      	<div style="margin-top: 10px;">
			                                          	<span class="input-group-btn">
			                                            <a id="lfm" data-input="thumbnail" data-preview="previewimg" class="btn btn-primary">
			                                             	<input type="file" name="image">
			                                            </a>
			                                         	 </span>
			                                          	@if ($errors->has('image'))
			                                              	<span class="errors">{{$errors->first('image')}}</span>
			                                          	@endif
			                                      	</div>
			                                  	</div>
			                              	</div>
			                          	</div>

			                          	{{-- size color quantity --}}
			                          	<div class="alert alert-danger print-error-msg" style="display:none">
								            <ul></ul>
								            </div>


								            <div class="alert alert-success print-success-msg" style="display:none">
								            <ul></ul>
								            </div>


								            <div class="table-responsive">  
								                <table class="table table-bordered" style="border: none;" id="dynamic_field">  
								                	<tr>
											       	<th>Size</th>
											       	<th>Color</th>
											       	<th>Select Unit</th>
											        <td><button type="button" name="add" id="add" class="btn btn-success">
											        	<span class="glyphicon glyphicon-plus"></span>
											        </button></td> 
										    	</tr>
								                    
								                </table>  
								                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
								            </div>

			                          	{{-- -- --}}
			                          	{{-- <div class="table-repsonsive">
										    <span id="error"></span>
										    <table class="table table-bordered" id="item_table">
										      	<tr>
											       	<th>Enter Item Name</th>
											       	<th>Enter Quantity</th>
											       	<th>Select Unit</th>
											       	<th><button type="button" name="add" class="btn btn-success btn-sm add_product_detail"><span class="glyphicon glyphicon-plus"></span></button></th>
										    	</tr>
										    </table>
										    <div align="center">
										      	<input type="submit" name="submit" class="btn btn-info" value="Insert" />
										    </div>
										</div> --}}
			           
			                      </div>
			                  </div>
			              
	          				</div>
	                        </div>
	                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
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
	<table class="table table-hover" id="products-table">

		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Description</th>
				<th>Sale_price</th>
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
		            { data: 'sale_price', name: 'sale_price' },
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

                var content = tinymce.get("textarea_content").getContent();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('product.store') }}',
                    data: {
                        _token: $('input[name=_token]').val(),
                        name: $('#name_add').val(),
                        description: content,
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
		});
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = '{{ asset('admin/product/store') }}';
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="name[]"  class="form-control name_list"><option value=""></option></select></td><td><select class="form-control" name="name[]"  class="form-control name_list"><option value=""></option></select></td><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>



<script>

    tinymce.init({
    selector: 'textarea',
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