@extends('layout')

@section('content')
	<div class="jumbotron jumbotron-fluid">
	  <div class="container-fluid">
	    <h1 class="display-4">{{$unique_visitors}} People near you are worried they have a cold.</h1>
	    <p class="lead">Mind giving us some anonymized information about how youre feeling?</p>
		<p class="lead">
		    <a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#questionModal" role="button">Learn More</a>
		</p>
		<!-- Modal -->
		<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="questionModalLabel">Tell us how you're feeling</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form id="symptomsForm" method="POST" action="/symptoms">
		      	<div class="modal-body">
	      			<div class="form-group">
					   <label for="lengthOfCold">How long have you been feeling symptoms?</label>
					    <select name="lengthOfCold" class="form-control" id="lengthOfCold">
					    	<option value="24">Less Than 24 Hours</option>
					    	<option value="48">24-48 Hours</option>
					    	<option value="3to5">3-5 Days</option>
					    	<option value="6plus">6+ Days</option>
					    </select>
					 </div>
					 <hr>
					 Please check off the symptoms you are feeling:
					<div class="form-check">
					  	<label class="form-check-label">
							<input name="soreThroat" class="form-check-input" type="checkbox" value="soreThroat">Sore Throat
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
							<input name="runnyNose" class="form-check-input" type="checkbox" value="runnyNose">Runny Nose
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
							<input name="sneezing" class="form-check-input" type="checkbox" value="sneezing">Sneezing
					  	</label>
					</div>
					<div class="form-check">
					 	<label class="form-check-label">
							<input name="fatigue" class="form-check-input" type="checkbox" value="fatigue">Fatigue
					  	</label>
					</div>
					<div class="form-check">
					  	<label class="form-check-label">
							<input name="cough" class="form-check-input" type="checkbox" value="cough">Cough
					  	</label>
					</div>
					 <a href="https://www.webmd.com/cold-and-flu/cold-guide/common_-cold-symptoms#1" target="_blank">You usually don't get a fever with a cold. If you do, it may be a sign you've got the flu or an infection with a bacteria.</a>
					<hr>
	      			<div class="form-group pt-2">
						How would you rate the severity of this cold compared to ones you've had before?
					</div>
					<div class="form-check form-check-inline">
						 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
						 <label class="form-check-label" for="inlineRadio1">1</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  	<label class="form-check-label" for="inlineRadio2">2</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
					  	<label class="form-check-label" for="inlineRadio3">3</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
					  	<label class="form-check-label" for="inlineRadio4">4</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
					  	<label class="form-check-label" for="inlineRadio5">5</label>
					</div>
		      	</div>
		    	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="symptomsFormSubmit" class="btn btn-primary">Submit</button>
		      </div>
		  	</form>
		    </div>
		  </div>
		</div>

	  </div>
	</div>
	<div class="row">
	  	<div class="mb-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">Heatmap</h5>
			    <p class="card-text">Want to find out more? Check out the heatmap to see where the most people are feeling symptoms.</p>
			    <a href="/heatmap" class="btn btn-primary">Heatmap</a>
			  </div>
			</div>
		</div>
	  	<div class="mb-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">Help</h5>
			    <p class="card-text">Need advice or help? We're not doctors but we have some links, tips, and products that we find helpful on the help page. Yum.</p>
			    <a href="/help" class="btn btn-primary">Help</a>
			  </div>
			</div>
		</div>
	  	<div class="mb-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title">Curious?</h5>
			    <p class="card-text">Want to know how this site works? Our \about section has all the juicy details or you can check us out on <a href='/about'>Github.</p>
			    <a href="#" class="btn btn-primary">About</a>
			  </div>
			</div>
	  	</div>
	  </div>
	</div>
@endsection		
