@extends('Layouts.main')
@section('main_content')

<div class="hold-transition">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Fill up client details</h3>
						</div>
						<form action="{{route('inbound.store')}}" method="POST">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										<div class="form-group">
											<label for="inputName">Full Name <span class="text-danger">*</span></label>
											<input type="text" id="inputName" name="name" class="form-control" placeholder="Full Name" value="{{ $info->name}}">
											<span class="text-danger">@error('name'){{$message}} @enderror</span>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label for="phone">Phone <span class="text-danger">*</span></label>
											<input type="text" readonly id="phone" name="phone" class="form-control" value="{{ $info->phone}}">
											<span class="text-danger">@error('phone'){{$message}} @enderror</span>
										</div>
									</div>
									<input type="hidden" name="outbound" value="Outbound">
									<div class="col-4">
										<div class="form-group">
											<label for="district">District</label>
											<select id="inputStatus" name="district" class="form-control custom-select">
												<option selected disabled>Select one</option>
												@foreach($districts as $item)
												@if($info->location == $item->name)
												<option selected value="{{$item->name}}" >{{$item->name}}</option>
												@else
												<option value="{{$item->name}}" >{{$item->name}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>	
								</div>
								<div class="form-group">
									<label for="inputDescription">Full Address</label>
									<textarea id="inputDescription" name="address" class="form-control" rows="3">{{ $info->address}}</textarea>
								</div>
								<div class="row">
									<div class="col-4">
										<div class="form-group">
											@php $types = ['Bashundhara LPG Ltd', 'Index LPG Ltd', 'Jamuna LPG Ltd', 'Orion LPG Ltd', 'Laugfs LPG Ltd',
											'Omera LPG Ltd','Totalgaz LPG Ltd','JMI LPG Ltd','Navana LPG Ltd','Unigas LPG Ltd','BM LPG Ltd','Petromex LPG Ltd','Beximco LPG Ltd','United AyGas LPG Ltd']; @endphp
											<label for="district">Current Usage LPG Company Name</label>
											<select id="inputStatus" name="currentCpmpany" class="form-control custom-select">
												<option selected disabled>Select one</option>
												@foreach($types as $item)
												@if($info->company_name == $item)
												<option selected value="{{$item}}">{{$item}}</option>
												@else
												<option value="{{$item}}">{{$item}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											@php $types = ['12 Kg','35 Kg','45 Kg'] ; @endphp
											<label for="district">Request LPG Cylinder Types</label>
											<select id="inputStatus" name="cylinderType" class="form-control custom-select">
												<option selected disabled>Select one</option>
												@foreach($types as $item)
												@if($info->cylinder == $item)
												<option selected value="{{$item}}">{{$item}}</option>
												@else
												<option value="{{$item}}">{{$item}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											@php $types = ['Word of mouth','Social Media','TVC','Online Advertisement','Website','News Paper','Others Source'] ; @endphp
											<label for="district">Source of Information</label>
											<select id="inputStatus" name="source" class="form-control custom-select">
												<option selected disabled>Select one</option>
												@foreach($types as $item)
												@if($info->source == $item)
												<option selected value="{{$item}}">{{$item}}</option>
												@else
												<option value="{{$item}}">{{$item}}</option>
												@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>


								<div class="form-group">
									@php $types = ['Interested To Dealership','Wants To Purchase','Information Query','Price Query','Want To Refill','Complaint Query','Wants Home Delivery','Others'] ; @endphp
									<label for="inputStatus">Query Type</label>
									<select id="inputStatus" name="queryType" class="form-control custom-select">
										<option selected disabled>Select one</option>
										@foreach($types as $item)
										@if($info->query == $item)
										<option selected value="{{$item}}">{{$item}}</option>
										@else
										<option value="{{$item}}">{{$item}}</option>
										@endif
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="inputDescription">Remarks</label>
									<textarea id="inputDescription" name="remarks" class="form-control" rows="3">{{$info->remark}}</textarea>
								</div><hr>
								<div class="col-12">
									<button type="submit" class="btn btn-success float-right"> Save</button>
								</div>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</section>
	</div>
</div>

@endsection