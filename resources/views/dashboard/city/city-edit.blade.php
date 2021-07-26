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
					<input type="text" name="city_name" value="{{ $city->name }}" required>
					@if ($errors->has('city_name'))
						<span class="text-danger">{{ $errors->first('city_name') }}</span>
					@endif
				</div>
                <div class="group">
					<label>اسم المدينة( انكليزي ): <span class="require">*</span></label>
					<input type="text" name="city_name_en" value="{{ $city->name }}" required>
					@if ($errors->has('city_name'))
						<span class="text-danger">{{ $errors->first('city_name') }}</span>
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
                    <label>إضافة صور جديدة</label>
                    <input type="file" name="img[]" accept="image/*" multiple id="city_image">
					<small>يمكن رفع صورة واحدة أو أكثر (يجب أن يكون حجم كل صورة أقل من 2 ميغابايت)</small>

                    @if ($errors->has('img'))
                    <span class="text-danger">{{ $errors->first('img') }}</span>
                    @endif
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="exampleInputFile">عرض الصورة</label>
                        <div class="input-group">
                            <img src="{{ asset($city->img) }}" class="img-fluid small-img"
                                id="image_preview_container">
                        </div>
                    </div>
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