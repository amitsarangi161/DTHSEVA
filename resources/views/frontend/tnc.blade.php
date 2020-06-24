  @extends('layouts.frontend')
  @section('content')
    <div class="body-content">
	<div class="container">
		<div class="sign-in-page">
		<br>
			    
			    <br>
			    <br>	<div class="row">
			   @if($company)
			    {!!$company->tnc!!}
			    @else
			    
			    <br>
			    <br>
			    <br>
			    <br>
			    <br>
			    <br>
			    <br>
			    <br>
			    <br>
			    
			    @endif			    </div><br>
			    <br>
			    <br>
			    </div>
			    </div>
			    </div>
  
  
  @endsection