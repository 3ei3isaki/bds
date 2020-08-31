<div class="card">
     <div class="card-header">
          <a href="{{route('adminPostGetAdd')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Thêm Bất Động Sản</a>
     </div>
     <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
               <thead>
                    <tr>
                         <th>Mã</th>
                         <th>Tiêu đề</th>
                         <th>Danh mục</th>
                         <th>Dự Án</th>
                         <th>Người đăng</th>
                         <th>Ngày đăng</th>
                         <th>Trạng thái</th>
                         <th></th>
                    </tr>
               </thead>
               <tbody>
                    @foreach ($data['post_list'] as $item)
                    <tr>
                         <td>{{ $item->PostId }}</td>
                         <td>{{ $item->Title }}</td>
                         @foreach ($data['category_list'] as $category_item)
                         @if ($item->CategoryId === $category_item->CategoryId)
                         <td>{{ $category_item->Name }}</td>
                         @break
                         @endif
                         @endforeach

                         @if ($item->ProjectId !== null)
                         @foreach ($data['project_list'] as $project_item)
                         @if ($item->ProjectId === $project_item->ProjectId)
                         <td>{{ $project_item->Title }}</td>
                         @break
                         @endif
                         @endforeach
                         @else
                         <td>Không</td>
                         @endif

                         <td>{{ $item->Author->FirstName }}</td>
                         <td>{{ date_format(date_create(date("Y-m-d H:i:s", strtotime($item->created_at))), 'd/m/Y | H:i:s') }}</td>

                         @switch($item->Status)
                         @case(1)
                         <td class="text-success">Hoạt động</td>
                         @break
                         @case(-1)
                         <td class="text-secondary">Không hoạt động</td>
                         @break
                         @case(0)
                         <td class="text-warning">Chờ duyệt</td>
                         @break
                         @default
                         @endswitch

                         <td>
                              <a href="{{route('adminPostGetEdit', $item->PostId)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</a>
                              <form class="d-inline" action={{route('adminPostDelete', $item->PostId)}} method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</button>
                              </form>
                         </td>
                    </tr>
                    @endforeach
               </tbody>
               <tfoot>
                    <tr>
                         <th>Mã</th>
                         <th>Tiêu đề</th>
                         <th>Danh mục</th>
                         <th>Dự Án</th>
                         <th>Người đăng</th>
                         <th>Ngày đăng</th>
                         <th>Trạng thái</th>
                         <th></th>
                    </tr>
               </tfoot>
          </table>
     </div>
</div>

<script>
     $("#dataTable").DataTable({
         "responsive": true,
         "autoWidth": true,
         "columns": [
               null,
               null,
               null,
               null,
               null,
               null,
               null,
               { "width": "18%" }
          ]
    });
</script>
