<div class="container">
  <br><br>
  <div class="row">

    <div class="col-md-3">
      <div class="form-group">
        <label><b>Service Type</b></label>
        <select name="service_type_id" class="form-control">
          <option value="">- Select your service type -</option>
          @foreach ($service_types as $service_type)
          <option class="non_default" id="service-type{{ $service_type->id }}"  
            value="{{ $service_type->id }}">
            {{ $service_type->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label><b>Aircon Type</b></label>
        <select name="appliance_id" class="form-control">
          <option value="">- Select your aircon type -</option>
          @foreach ($appliances as $appliance)
          <option class="non_default" data-fee="{{ $appliance->fee }}" value="{{ $appliance->id }}">
            {{ $appliance->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label><b>Brand</b></label>
        <select name="brand_id" class="form-control">
          <option value="">- Select your brand -</option>
          @foreach ($brands as $brand)
          <option value="{{ $brand->id }}">
            {{ $brand->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label><b>Unit Type</b></label>
        <select name="unit_id" class="form-control">
          <option value="">- Select your unit type -</option>
          @foreach ($units as $unit)
          <option value="{{ $unit->id }}">
            {{ $unit->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="row repair_problems_selection">
    <div class="col-md-12">
      <div class="form-group">
        <label><b>Repair Problems</b></label>
        <select name="trouble_id" class="form-control">
          <option value="">- Select your repair problems -</option>
          @foreach ($troubles as $trouble)
          <option value="{{ $trouble->id }}">
            {{ $trouble->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>