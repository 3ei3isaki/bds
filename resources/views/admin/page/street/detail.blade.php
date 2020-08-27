<form action="{{ Request::is('admin/street/add') ? route('adminStreetPostAdd') : route('adminStreetPutEdit') }}" method="post">
    @csrf

    @if (Request::is('admin/street/add'))
    @method('POST')
    @else
    @method('PUT')
    @endif

    <div class="card">
         <div class="card-header">
              <input class="btn btn-success" type="submit" value="Lưu">
              <a href="{{route('adminStreet')}}" class="btn btn-danger">Hủy bỏ</a>
         </div>
         <div class="card-body">

              <div class="form-group d-flex">
                   <label class="col-sm-2" for="areaId" style="padding-top: 7px;">Mã Phường Xã</label>
                   <div class="w-100">
                        <div class="form-group" >       
                            <select required name="areaId" class="form-control">
                              
                                   @foreach ($area_list as $area)
                                        <option value="{{$area->AreaId}}">{{$area->Name}}</option>
                                   @endforeach
                              
                            </select>
                        </div>
                   </div>
              </div>

              <div class="form-group d-flex">
                   <label class="col-sm-2" for="name" style="padding-top: 7px;">Tên Đường</label>
                   <div class="w-100">
                        <input id="name" class="form-control" type="text" placeholder="Tên đường" name="name" value="{{ $data['street_info']->name ?? old('Name') }}">
                   </div>
               </div>

               <div class="form-group d-flex" >
                    <label class="col-sm-2">Trạng thái</label>
                    <select required name="status" class="form-control">
                         <option value="1">Hiện</option>
                         <option value="-1">Ẩn</option>
                         <option value="0">Duyệt</option>
                </select>
               </div>

               <div class="form-group d-flex">
                   <label class="col-sm-2" for="Slug" style="padding-top: 7px;">Slug</label>
                   <div class="w-100">
                        <input id="slug" class="form-control" type="text" placeholder="Slug" name="slug" value="{{ old('Name') }}" readonly>
                   </div>
              </div>
         </div>
    </div>
</form>

<script>
    let name = document.getElementById('Name');
    let slug = document.getElementById('Slug');
    let convertToSlug = () => slug.value = name.value.trim().replace(/\s+/g, '-');

    convertToSlug();
    name.addEventListener('input', convertToSlug);
</script>