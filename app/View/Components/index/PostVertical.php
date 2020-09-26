<?php

namespace App\View\Components\index;

use App\Models\Area;
use App\Models\Category;
use App\Models\District;
use App\Models\Project;
use App\Models\Street;
use Illuminate\View\Component;

class PostVertical extends Component
{
     public $data;
     public $style;

     /**
      * Create a new component instance.
      *
      * @return void
      */
     public function __construct($postData, $postStyle = '')
     {
          // STRAT: get Location
          if ($postData->ProjectId !== null) {
               $projectDetail = Project::find($postData->ProjectId);

               $postData->StreetId = $projectDetail->StreetId;
          }

          $postData->Street = Street::find($postData->StreetId);
          $postData->Area = Street::find($postData->StreetId)->Area;
          $postData->District = Area::find($postData->Area->AreaId)->District;
          $postData->City = District::find($postData->District->DistrictId)->City;

          $postData->Location = (!empty($postData->Street->Name) ? $postData->Street->Name . ', ' : '') . (!empty($postData->Area->Name) ? $postData->Area->Name . ', ' : '') . (!empty($postData->District->Name) ? $postData->District->Name . ', ' : '') . (!empty($postData->City->Name) ? $postData->City->Name : '');
          // END: get Location

          $this->data = $postData;

          // STRAT: get Type
          $category = Category::where('CategoryId', $postData->CategoryId)->first();
          $type = Category::where(
               ['CategoryId' => $category->ParentId],
               ['ParentId' => 0]
          )->first();

          $this->data->category_type = $type->Name;
          // END: get Type

          // STRAT: get URL
          $this->data->url = route(
               'post',
               [
                    $type->Slug,
                    $category->Slug,
                    $postData->City->Slug,
                    $postData->District->Slug,
                    $postData->Area->Slug,
                    $postData->Slug
               ]
          );
          // END: get URL

          $this->style = $postStyle;
     }

     /**
      * Get the view / contents that represent the component.
      *
      * @return \Illuminate\View\View|string
      */
     public function render()
     {
          return view('components.index.post-vertical', ['data' => $this->data]);
     }
}