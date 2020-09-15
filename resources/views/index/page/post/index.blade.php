<div id="app">
     <div id="ismain-homes">
          <div class="bgheadproject hidden-xs" style="background: url('{{ asset('dist/img/banner-du-an.jpg') }}')">
               <div class="description">
                    <div class="container-fluid w90">
                         <h1 class="text-center">Bất động sản</h1>
                         <p class="text-center">Chúng tôi luôn cập nhật những bất động sản mới nhất</p>
                         <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                              <li class="breadcrumb-item active">Bất động sản</li>
                         </ul>
                    </div>
               </div>
          </div>

          <p>
               <div class="container-fluid w90">
                    <div class="row">
                         <div class="homehouse padtop30 col-sm-9 col-md-9">
                              <div class="row">
                                   <div class="col-12">
                                        <h2>Bất động sản</h2>
                                        <p>Danh sách bất động sản</p>
                                   </div>
                              </div>
                              <div class="row rowm10">
                                   @empty(!$data['post_list'])
                                   @foreach ($data['post_list'] as $post_item)
                                   <div class="col-sm-4 col-md-4 colm10">
                                        <x-index.post-vertical :postStyle="'background: #fff; box-shadow: 0 0 20px rgba(0,0,0,.25);'" :postData="$post_item" :postLocation="(!empty($post_item->StreetName) ? $post_item->StreetName.', ' : '') . (!empty($post_item->AreaName) ? $post_item->AreaName.', ' : '') . (!empty($post_item->DistrictName) ? $post_item->DistrictName.', ' : '') . (!empty($post_item->CityName) ? $post_item->CityName : '')" />
                                   </div>
                                   @endforeach
                                   @endempty
                              </div>
                         </div>

                         <!--<property-component type="rent" url="https://flex-home.botble.com/ajax/properties"></property-component>-->
                         <div class="padtop30 col-sm-3 col-md-3">
                              @include('index.components.search-box')
                              {{-- @include('index.components.box-right') --}}
                         </div>
                    </div>
               </div>
          </p>
     </div>
</div>
