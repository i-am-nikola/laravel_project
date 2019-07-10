
@extends('admin.master')

@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
	@include('admin.blocks.error');
	<form action="" method="POST">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<div class="form-group">
			<label>Category Parent</label>
			<select class="form-control" name="parent_id">
					<option value="0">Please Choose Category</option>
					<?php cate_parent($parent, 0,'--', $data['parent_id']) ?>
			</select>
		</div>
		<div class="form-group">
			<label>Category Name</label>
			<input class="form-control" name="name" placeholder="Please Enter Category Name" value="{!! old('name', isset($data)? $data['name']: '') !!}" />
		</div>
		<div class="form-group">
			<label>Category Order</label>
			<input class="form-control" name="order" placeholder="Please Enter Category Order" value="{!! old('order', isset($data)? $data['order']: '') !!}" />
		</div>
		<div class="form-group">
			<label>Category Keywords</label>
			<input class="form-control" name="keyword" placeholder="Please Enter Category Keywords" value="{!! old('keyword', isset($data)? $data['keyword']: '') !!}" />
		</div>
		<div class="form-group">
			<label>Category Description</label>
			<textarea class="form-control" rows="3" name="description">{!! old('description', isset($data)? $data['description']: '') !!}</textarea>
		</div>
		<button type="submit" class="btn btn-default">Category Edit</button>
		<button type="reset" class="btn btn-default">Reset</button>
	<form>
</div>
@endsection
