
@extends('admin.master')
@section('content')
  <div class="col-lg-7" style="padding-bottom:120px">
    @if (count($errors))  
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
        <label>Category Parent</label>
        <select class="form-control" name="parent_id">
          <option value="0">Please Choose Category</option>
          <?php cate_parent($parent) ?>
        </select>
      </div>
      <div class="form-group">
        <label>Category Name</label>
        <input class="form-control" name="name" placeholder="Please Enter Category Name" />
      </div>
      <div class="form-group">
        <label>Category Order</label>
        <input class="form-control" name="order" placeholder="Please Enter Category Order" />
      </div>
      <div class="form-group">
        <label>Category Keywords</label>
        <input class="form-control" name="keyword" placeholder="Please Enter Category Keywords" />
      </div>
      <div class="form-group">
        <label>Category Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
      </div>
      <div class="form-group">
        <label>Category Status</label>
        <label class="radio-inline">
            <input name="status" value="1" checked="" type="radio">Visible
        </label>
        <label class="radio-inline">
            <input name="status" value="2" type="radio">Invisible
        </label>
      </div>
      <button type="submit" class="btn btn-default">Category Add</button>
      <button type="reset" class="btn btn-default">Reset</button>
    <form>
  </div>
@endsection
