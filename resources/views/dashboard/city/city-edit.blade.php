@include('dashboard.layouts.header')

<div class="page-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="main-title">
                    تعديل بيانات المدينة:
                </h2>
            </div>
       
         <form class="form-group col-12" method="POST" enctype="multipart/form-data" action="{{ url('admin/city/update/'.$city->id) }}">
                @csrf
                <div class="group">
                    <label>اسم المدينة: <span class="require">*</span></label>
                    <input type="text" name="city_name" value="{{ $city->translate('ar')->name }}" required>
                    @if ($errors->has('city_name'))
                    <span class="text-danger">{{ $errors->first('city_name') }}</span>
                    @endif
                </div>
                <div class="group">
                    <label>اسم المدينة (انكليزي) <span class="require">*</span></label>
                    <input type="text" name="city_name_en" value="{{ $city->translate('en')->name }}" required>
                    @if ($errors->has('city_name_en'))
                    <span class="text-danger">{{ $errors->first('city_name_en') }}</span>
                    @endif
                </div>
				<div class="group">
					<label>صور المدينة: </label>
					<div class="row">
						@foreach ($city->images as $img)
							<div class="col-md-4 col-sm-6 col-12">
								<div class="guide-block">
									<img src="{{ asset ($img->img) }}" class="img-fluid">
									<ul>
										<li>
											<button type="button" class="delete-btn" data-toggle="modal" data-target="{{'#exampleModal'.$img->id }}">
												<i class="fas fa-trash-alt"></i>
											</button>
										</li>
									</ul>
								</div>
							</div>
						@endforeach
</div>
                <div class="group">
                    <button type="submit">حفظ</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Message -->
@if(session()->has('message'))
<p class="message-box done">
    {{ session()->get('message') }}
</p>
@endif
<!-- ./Message -->

@include('dashboard.layouts.footer')