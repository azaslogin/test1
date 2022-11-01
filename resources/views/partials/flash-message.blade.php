@if ($message = Session::get('success'))
<div class="w-full p-2 m-4 text-center bg-green-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
		<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="w-full p-2 m-4 text-center bg-red-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
	<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="w-full p-2 m-4 text-center bg-yellow-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
	<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="w-full p-2 m-4 text-center bg-blue-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
	<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif
