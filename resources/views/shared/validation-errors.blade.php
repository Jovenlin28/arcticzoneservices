@if ($errors->any())
<div class="error">
  <h5>There are errors encountered:</h5>
  <ul>
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif