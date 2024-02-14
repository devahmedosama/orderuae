<!-- start footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6">
					<!-- download apps -->
					<div class="footer-shares mb-4 mb-sm-0">
						<p class="foot-title">Download The APP</p>
						<div class="social">
							<a href="" class="app">
								<img src="{{ URL::to('assets/site') }}/img/app-store.png" alt="">
							</a>
							<a href="" class="app">
								<img src="{{ URL::to('assets/site') }}/img/google-play.png" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<!-- social media -->
					<div class="footer-shares">
						<p class="foot-title">Connect With Us</p>
						<div class="social">
							<a href="" class="link">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a href="" class="link">
								<i class="fab fa-twitter"></i>
							</a>
							<a href="" class="link">
								<i class="fab fa-instagram"></i>
							</a>
							<a href="" class="link">
								<i class="fab fa-linkedin-in"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- end footer -->

	<!--modals-->

	<!-- Optional JavaScript -->
	<script src="{{ URL::to('assets/site') }}/js/jquery-3.4.1.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/popper.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/bootstrap.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/owl.carousel.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/wow.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/select2.min.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/intlTelInput.js"></script>
	<script src="{{ URL::to('assets/site') }}/js/main.js?v=1.04"></script>
	<script type="text/javascript">
		var  base_url      = '{{ URL::to("/") }}';
		var  lang          = '{{ $lang }}';
		var  department_id =  '{{ $department->id }}';
	</script>
	<script src="{{ URL::to('assets/site') }}/js/my.js"></script>
	
</body>

</html>