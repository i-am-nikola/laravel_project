@extends('admin.master');
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr align="center">
      <th>ID</th>
      <th>Name</th>
      <th>Category Parent</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt = 1; ?>
    @foreach ($categories as $category)
    <tr class="odd gradeX" align="center">
      <td>{!! $stt !!}</td>
      <td>{!! $category['name'] !!}</td>
      <td>
        @if ($category['parent_id'] == 0)
            {!! "None" !!}
        @else
            <?php
              $parent = DB::table('categories')->where('id', $category['parent_id'])->first();
              echo $parent->name;
            ?>
        @endif
      </td>
      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return deleteWarning('Đối tượng này sẽ xóa vĩnh viễn, bạn có chắc chắn muốn xóa?')" href="{!! URL::route('admin.cate.getDelete', $category['id']) !!}"> Delete</a></td>
      <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.cate.getEdit', $category['id']) !!}">Edit</a></td>
    </tr>
    <?php $stt++; ?>
    @endforeach
  </tbody>
</table>
@endsection
