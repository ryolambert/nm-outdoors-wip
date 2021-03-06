<?php require_once ("head-utils.php");?>
<?php require_once "navbar.php"; ?>
<!--

 this component is the modal that will "pop up" when a user elects
 to either sign up for a profile or sign into a profile.
 It will contain two tabs: Left will be for sign-in,
 Right will be for sign-up

 This component will require the use of Bootstrap 4, Popper, and JQuery

-->


<!--This button triggers the modal and is not part of the actual component-->
		<div class="container">
			<hr />
			<br />
				<h3>Please sign in</h3>
				<br />
				<a class="btn btn-primary btn-lg" href="#signin" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Sign Up</a>
			<br />
			<hr />
		</div>
<!--/end button-->

		<!-- Modal Structure -->
		<div class="modal fade bs-modal-sm" id="sign-in-up-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<br />
					<nav class="bs-example bs-example-tabs">
						<!-- sets the tabs -->
						<div id="nav-tab" class="nav nav-tabs" role="tablist">
							<!-- two tabs: sign in and sign up -->
							<a class="nav-item nav-link active" href="#signin" data-toggle="tab" role="tab" aria-controls="nav-signin" aria-selected="true">Sign In</a>
							<a class="nav-item nav-link" href="#signup" data-toggle="tab" role="tab" aria-controls="nav-signup" aria-selected="true">Sign Up</a>
						</div>
					</nav>
					<div class="modal-body">
						<div id="nav-tabContent" class="tab-content">
							<div class="tab-pane fade show active" id="signin">
								<h6>Sign into your account here</h6>
								<form class="form-horizontal">
									<fieldset>

										<!-- Sign In Form -->
										<!-- Text input-->
										<div class="control-group">
											<label class="control-label" for="at-handle">Name:</label>
											<div class="controls">
												<input id="at-handle" type="text" class="form-control input-medium" placeholder="" required="required">
											</div>
										</div>

										<!-- Password input-->
										<div class="control-group">
											<label class="control-label" for="password">Password:</label>
											<div class="controls">
												<input required="required" id="password" class="form-control input-medium" type="password" placeholder="********">
											</div>
										</div>

										<!-- Submit Button -->
										<div class="control-group">
											<label class="control-label" for="signin"></label>
											<div class="controls">
												<button id="signin" name="signin" class="btn btn-success">Sign In</button>
											</div>
										</div>
									</fieldset>
								</form>
							</div>

							<!-- Sign Up Form -->
							<!-- Text input-->

							<div class="tab-pane fade" id="signup">
								<form class="form-horizontal">
									<h6>Sign up for an account here</h6>
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="userid">Username:</label>
											<div class="controls">
												<input id="userid" name="userid" class="form-control" type="text" placeholder="" required="required">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="Email">Email:</label>
											<div class="controls">
												<input id="email" class="form-control" type="text" placeholder="" required="required">
											</div>
										</div>

										<!-- Password input-->
										<div class="control-group">
											<label class="control-label" for="password">Password:</label>
											<div class="controls">
												<input id="password" name="password" class="form-control" type="password" placeholder="********" required="required">
											</div>
										</div>

										<!-- Text input-->
										<div class="control-group">
											<label class="control-label" for="reenterpassword">Re-Enter Password:</label>
											<div class="controls">
												<input id="reenterpassword" class="form-control" type="password" placeholder="********" required="required">
											</div>
										</div>

										<!-- Multiple Radios (inline) -->
										<!-- Replace with reCAPTCHA? -->
										<br>
										<div class="control-group">
											<label class="control-label" for="humancheck">Humanity Check:</label>
											<div class="controls">
												<label class="radio inline" for="humancheck-0">
													<input type="radio" name="humancheck" id="humancheck-0" value="robot" checked="checked">I'm a Robot</label>
												<label class="radio inline" for="humancheck-1">
													<input type="radio" name="humancheck" id="humancheck-1" value="human">I'm Human</label>
											</div>
										</div>

										<!-- Button -->
										<div class="control-group">
											<label class="control-label" for="confirmsignup"></label>
											<div class="controls">
												<button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
<?php require_once "footer.php"; ?>