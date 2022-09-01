<div class="col-md-3 bg-info pt-3 pl-0 pr-0">
								<center><img src="images/avatar5.png" class="w-50 round text-center"></center>

								<center class="mt-4">
									<b class="text-capitalize mt-4 text-light text-center"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ; ?></b>
									</center>
								<a  href="profile.php"  class="nav-link border-bottom mt-2 text-light" title="User's Dashboard">

									<b class="fas fa-box text-light mr-3"></b>USER'S DASHBOARD
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
								<a href="bookedtickets.php" class="text-light nav-link border-bottom border-light" title="Book Ticket">
									<b class="fas fa-ticket-alt text-light mr-3"></b>Booked tickets
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>

								<a href="canceltrip.php" class="nav-link border-bottom text-light" title="Cancel Trip">
									<b class="fas fa-times-circle mr-3"></b>
										Cancel Trip
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>

								<a href="return.php" class="nav-link border-bottom text-light" title="Return a ticket">
									<b class="fas fa-fast-backward mr-3"></b>
										Return a ticket
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>

								<a href="support.php" class="nav-link border-bottom text-light" title="Support">
									<b class="fas fa-question-circle mr-3"></b>
										Support
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>

								<a href="logout.php" class="nav-link border-bottom bg-danger text-light" title="Logout">
									<b class="fas fa-sign-out-alt mr-3"></b>
										Logout
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
							</div>