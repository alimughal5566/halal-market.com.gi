@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="{{ __('PAGE') }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('Pages') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="javascript:;">{{ __('Menu Page Settings') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-page-index') }}">{{ __('Pages') }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">
										@if (session()->has('success'))
											<div class="row">
												<div class="col-md-12">
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													{{ session('success') }}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												</div>
											</div>
										@endif
										@include('includes.admin.form-success') 

										<div class="table-responsiv">
												<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
									                        <th>{{ __('#') }}</th>
									                        <th>{{ __('Username') }}</th>
									                        <th>{{ __('Email') }}</th>
									                        <th>{{ __('Created At') }}</th>
									                        <th>{{ __('Action') }}</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($affiliation as $affiliate)

															<tr>
																<td>{{++$counter }}</td>
																<td>{{$affiliate->name }}</td>
																<td>{{ $affiliate->email }}</td>
																<td> {{ $affiliate->created_at }}</td>
																<td>

																	<a href="{{ route('admin-affiliation-edit', $affiliate->id) }}" title="Edit">
																		<i class="fa fa-edit"></i>
																	</a>
																	|
																	<a href="{{ route('admin-affiliation-delete', $affiliate->id) }}"
																		onclick="return confirm('This action is not revertible. Are you sure you want to delete this Affiliation?');"
																		title="Delete">
																			<i class="fa fa-trash text-danger"></i>
																	</a>
																</td>

															</tr>
														@endforeach
													</tbody>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	<div class="modal-header d-block text-center">
		<h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{ __('You are about to delete this Page.') }}</p>
            <p class="text-center">{{ __('Do you want to proceed?') }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
            <a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}


@endsection    



@section('scripts')

    <script type="text/javascript">	
	$(document).ready(function() {
    	$('#example').DataTable({
			"dom": '<"pull-left"f><"pull-right"l>tip'
		});
	} );										
							
    </script>
@endsection   