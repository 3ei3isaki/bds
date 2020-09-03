<form enctype="multipart/form-data" id="main" action="{{ Request::is('admin/project/add') ? route('adminProjectPostAdd') : route('adminProjectPutEdit', $data['project_info']->ProjectId) }}" method="post">
    
     @csrf

     @if (Request::is('admin/project/add'))
     @method('POST')
     @else
     @method('PUT')
     @endif

    <div class="card">
         <div class="card-header">
              <input class="btn btn-success" type="submit" value="Lưu">
              <a href="{{route('adminProject')}}" class="btn btn-danger">Hủy bỏ</a>
         </div>
         <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#basicInfo">Thông tin</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#descriptionInfo">Mô tả</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#imageInfo">Ảnh</a>
                </li>
           </ul>
        
            <div class="tab-content">
                <div class="tab-pane active container" id="basicInfo">
                    <div class="form-group d-flex" >
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Tên Dự Án</label>
                        <div class="w-100">
                            <input id="title" class="form-control" type="text" placeholder="Tên Dự Án" name="Title" value="{{ $data['project_info']->Title ?? old('Title') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                        </div>
                        
                    </div>
                    

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Địa Chỉ</label>
                        <div class="w-100">
                            <input id="location" class="form-control" type="text" placeholder="Địa Chỉ" name="Location" value="{{ $data['project_info']->Location ?? old('Location') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Chủ Đầu Tư</label>
                        <div class="w-100">
                            <input id="investor" class="form-control" type="text" placeholder="Chủ Đầu Tư" name="Investor" value="{{ $data['project_info']->Investor ?? old('Investor') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Số Block</label>
                        <div class="w-100">
                            <input id="block" class="form-control" type="text" placeholder="Số Block" name="NumberOfBlock" value="{{ $data['project_info']->NumberOfBlock ?? old('NumberOfBlock') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>
                    
                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Số Floor</label>
                        <div class="w-100">
                            <input id="floor" class="form-control" type="text" placeholder="Số Floor" name="NumberOfFloor" value="{{ $data['project_info']->NumberOfFloor ?? old('NumberOfFloor') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Số Căn Hộ</label>
                        <div class="w-100">
                            <input id="apartment" class="form-control" type="text" placeholder="Số Căn Hộ" name="NumberOfApartment" value="{{ $data['project_info']->NumberOfApartment ?? old('NumberOfApartment') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                   <div class="form-group d-flex">
                    <label class="col-sm-2" for="City" style="padding-top: 7px;">Thành Phố</label>
                    <div class="w-100">
                         <div class="form-group">    
                              <select class="form-control" name="AreaApartment" id="city">
                                   <option value="" aria-readonly="true">Chọn Thành Phố</option>
                                   @isset($data['city_list'])
                                   @foreach ( $data['city_list'] as $item )
                                        <option value="{{ $item->CityId }}" {{ $item->CityId === ($data['project_info']->CityId ?? '') ? 'selected' : '' }}>{{ $item->Name }}</option>
                                   @endforeach
                                   @endisset
                              </select>
                         </div>
                         <div class="col-lg-12 messages text-danger"></div>
                    </div>
               </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px.r;">Tổng Diện Tích</label>
                        <div class="w-100">
                            <input id="totalarea" class="form-control" type="text" placeholder="Tổng Diện Tích" name="TotalArea" value="{{ $data['project_info']->TotalArea ?? old('TotalArea') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 1px.r;">Mật độ</label>
                        <div class="w-100">
                              <input id="density" class="form-control" type="text" placeholder="Mật độ" name="BuildingDensity" value="{{ $data['project_info']->BuildingDensity ?? old('BuildingDensity') }}">
                              <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Năm Xây Dựng</label>
                        <div class="w-100">
                            <input id="year" class="form-control" type="text" placeholder="Năm Xây Dựng" name="YearBuilt" value="{{ $data['project_info']->YearBuilt ?? old('YearBuilt') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex">
                        <label class="col-sm-2" for="name" style="padding-top: 7px;">Giá</label>
                        <div class="w-100">
                            <input id="price" class="form-control" type="text" placeholder="Giá" name="Price" value="{{ $data['project_info']->Price ?? old('Price  ') }}">
                            <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>

                    <div class="form-group d-flex" >
                        <label class="col-sm-2">Trạng thái</label>
                        <div class="w-100">
                             <div class="form-group">
                                   <select class="form-control" name="Status" id="status">
                                        <option value="1" {{ ($data['project_info']->Status ?? '') === 1 ? 'selected' : '' }}>Đang hoạt động</option>
                                        <option value="-1" {{ ($data['project_info']->Status ?? '') === -1 ? 'selected' : '' }}>Không hoạt động</option>
                                        <option value="0" {{ ($data['project_info']->Status ?? '') === 0 ? 'selected' : '' }}>Chờ duyệt</option>
                                   </select>
                             </div>
                             <div class="col-lg-12 messages text-danger"></div>
                        </div>
                   </div>

                   <div class="form-group d-flex">
                         <label class="col-sm-2" for="Slug" style="padding-top: 7px;">Slug</label>
                         <div class="w-100">
                              <input id="slug" class="form-control" type="text" placeholder="" name="Slug" value="{{ old('Name') }}" readonly>
                              <div class="col-lg-12 messages text-danger"></div>
                         </div>
                    </div>
               </div>

               <div class="tab-pane container" id="descriptionInfo">
                    <div class="form-group">
                         <label class="col-sm-2" for="Description" style="padding-top: 7px;">Mô tả</label>
                         <div class="md-form">
                              <textarea id="desc" name="Description" class="md-textarea form-control" rows="10">{{ $data['project_info']->Description ?? old('Description') }}</textarea>
                         </div>
                         <div class=" col-lg-12 messages text-danger"></div>
                    </div>
               </div>

                <div class="tab-pane container" id="imageInfo">
                    <div class="card text-center mt-4">
                         <div class="card-header bg-info">
                              Chọn ảnh để tải lên!
                         </div>
                         <div class="card-body">
                              <div class="input-group mb-3">
                                   <div class="custom-file">
                                        <input multiple type="file" name="Image[]" class="custom-file-input" id="#inputImageFile">
                                        <label class="custom-file-label" for="inputImageFile" style="white-space: nowrap; overflow: hidden;">Bấm vào để chọn ảnh</label>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-12 d-flex flex-wrap" id="imageImputList"></div>
                              </div>
                         </div>
                         <div class="card-footer text-muted" id="inputImageCount">
                              Chưa chọn ảnh nào!
                         </div>
                    </div>
                    <div class="card text-center mt-4">
                         <div class="card-header bg-success">
                              Danh sách ảnh của bất dộng sản này
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-md-12 d-flex flex-wrap" id="imageList">
                                        @isset($data['post_info'])
                                        @for ($i = 0; $i < count(explode("|", $data['project_info']->Image)); $i++)
                                             @if (explode("|", $data['project_info']->Image)[$i] !== '')
                                             <figure class="col-md-4">
                                                  <div class="w-100" style="height: 300px; position: relative;">
                                                       <img alt="picture" src="{{ asset(explode("|", $data['project_info']->Image)[$i]) }}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; margin: auto; max-height: 100%; max-width: 100%" />
                                                  </div>
                                             </figure>
                                             @endif
                                             @endfor
                                             @endisset
                                   </div>
                              </div>
                         </div>
                    </div>
                </div>
           </div>
    </div>
</form>

<script>

    let name = document.getElementById('title');
    let slug = document.getElementById('slug');
    slug.value = convertToSlug(name.value);
    name.addEventListener('input', () => slug.value = convertToSlug(name.value));

    $("#inputImageFile").change(function() {
          loadPreviewFile(this);
     });

     let loadPreviewFile = (input) => {
          $preview = $('#imageImputList').empty();

          if (input.files) {
               if (input.files.length === 0) {
                    $('#inputImageCount').text('Chưa chọn ảnh nào!');
               } else {
                    $('#inputImageCount').text(`Đã chọn ${input.files.length} ảnh! Bấm lưu dể lưu thay đổi!`);

               }


               [...input.files].forEach(file => {
                    let reader = new FileReader();

                    reader.onloadend = (event) => {
                         let html = `<figure class="col-md-4">
                              <div class="w-100" style="height: 300px; position: relative;">
                                   <img alt="picture" src="${reader.result}" style="position: absolute; top: 0; left: 0; bottom: 0; right: 0; margin: auto; max-height: 100%; max-width: 100%">
                              </div>
                         </figure>`;

                         $preview.append($.parseHTML(html))
                    }

                    reader.readAsDataURL(file);
               });

          }
     };

     var validateConstraints = {
          title: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập tên dự án!"
               }
          },
          location: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập địa chỉ dự án!"
               },
          },
          investor: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập chủ đầu tư!"
               },
          },
          block: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập số Block!"
               },
          },
          floor: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập số Floor!"
               },
          },
          apartment: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập số Apartment!"
               },
          },
          city: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng chọn Thành Phố!"
               },
          },
          totalarea: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhạp diện tích!"
               },
          },
          density: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập mật độ!"
               },
          },
          year: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập năm xây dựng!"
               },
          },
          price: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập giá dự án!"
               },
          },
          status: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng chọn trạng thái dự án!"
               },
          },
          desc: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng nhập mô tả!"
               },
          },
          inputImageFile: {
               presence: {
                    allowEmpty: false,
                    message: "^Vui lòng chọn ảnh dự án!"
               },
          },
     }
     validateData('form#main', validateConstraints);
</script>
