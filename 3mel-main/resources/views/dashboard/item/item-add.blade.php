


@include('dashboard.layouts.header')

<div class="page-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<h2 class="main-title">
					إضافة مكان جديد:
				</h2>
			</div>
           
		 <form class="form-group col-12" method="POST" enctype="multipart/form-data" action="{{ url('admin/item/store') }}"> 
				@csrf
				<div class="group two">
					<label>اسم المكان (باللغة العربية): <span class="require">*</span></label>
					<input type="text" name="item_title_ar" required>
					@if ($errors->has('item_title_ar'))
						<span class="text-danger">{{ $errors->first('item_title_ar') }}</span>
					@endif
				</div>
				<div class="group two">
					<label>اسم المكان (باللغة الانكليزية): <span class="require">*</span></label>
					<input type="text" name="item_title_en" required>
					@if ($errors->has('item_title_en'))
						<span class="text-danger">{{ $errors->first('item_title_en') }}</span>
					@endif
				</div>
				<div class="clear"></div>
				<div class="group two">
					<label>وصف المكان (باللغة العربية): <span class="require">*</span></label>
					<textarea name="item_desc_ar" required></textarea>
					@if ($errors->has('item_desc_ar'))
						<span class="text-danger">{{ $errors->first('item_desc_ar') }}</span>
					@endif
				</div>
				<div class="group two">
					<label>وصف المكان (باللغة الانكليزية): <span class="require">*</span></label>
					<textarea name="item_desc_en" required></textarea>
					@if ($errors->has('item_desc_en'))
						<span class="text-danger">{{ $errors->first('item_desc_en') }}</span>
					@endif
				</div>
				<div class="clear"></div>
				<div class="group">
					<label>تصنيف المكان: <span class="require">*</span></label>
					<ul class="radio-choices">
						@foreach ($categories as $category)
						@if ($category->id != 4)
						<li class="radio-box">
							<input type="checkbox" value="{{ $category->id }}" name="category[]">
							<span>
								{{ $category->translate('ar')->name }}
							</span>
						</li>
						@endif
						@endforeach
						@if(count($categories) == 1)
						<li class="radio-box">
							<input type="checkbox" value="{{ $categories[0]->id }}" checked disabled name="category[]">
							<span>
								{{ $categories[0]->translate('ar')->name }}
							</span>
						</li>
						@endif
					</ul>
				</div>
				<div class="group two">
					<label>عنوان المكان (باللغة العربية): <span class="require">*</span></label>
					<input type="text" name="item_address_ar" required>
					@if ($errors->has('item_address_ar'))
						<span class="text-danger">{{ $errors->first('item_address_ar') }}</span>
					@endif
				</div>
				<div class="group two">
					<label>عنوان المكان (باللغة الانكليزية): <span class="require">*</span></label>
					<input type="text" name="item_address_en" required>
					@if ($errors->has('item_address_en'))
						<span class="text-danger">{{ $errors->first('item_address_en') }}</span>
					@endif
				</div>
				<div class="clear"></div>

				<div class="group">
					<label>المدينة التابع لها: <span class="require">*</span></label>
					<select name="item_city" required>
						<option selected disabled>-- اختر مدينةً --</option>
						@foreach ($cities as $city)
						<option value='{{ $city->id }}'>{{ $city->translate('ar')->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('item_city'))
						<span class="text-danger">{{ $errors->first('item_city') }}</span>
					@endif
				</div>

				<div class="group">
					<label>رقم الهاتف: <span class="require">*</span></label>
					<input type="tel" name="item_phone" required>
					@if ($errors->has('item_phone'))
						<span class="text-danger">{{ $errors->first('item_phone') }}</span>
					@endif
				</div>
				
				<div class="group">
					<label>صور المكان: <span class="require">*</span></label>
					<input type="file" name="img[]" accept="image/*" multiple required id="item_image">
					@if ($errors->has('img'))
						<span class="text-danger">{{ $errors->first('img') }}</span>
					@endif
					@if ($errors->has('img.*'))
						<span class="text-danger">{{ $errors->first('img.*') }}</span>
					@endif
				</div>
				<div id="image_preview"></div>
				
				<div class="group">
					<button type="submit">إضافة</button>
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