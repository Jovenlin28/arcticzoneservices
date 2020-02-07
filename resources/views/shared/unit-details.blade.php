<div class="container">
	<br><br>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label><b>Aircon Type</b></label>
				<select name="appliance_id" class="form-control">
					@foreach ($appliances as $appliance)
					<option value="{{ $appliance->id }}">
						{{ $appliance->name }}
					</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label><b>Brand</b></label>
				<select name="brand_id" class="form-control">
					@foreach ($brands as $brand)
					<option value="{{ $brand->id }}">
						{{ $brand->name }}
					</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label><b>Unit Type</b></label>
				<select name="unit_id" class="form-control">
					@foreach ($units as $unit)
					<option value="{{ $unit->id }}">
						{{ $unit->name }}
					</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
</div>