<footer class="footer">
	<div class="container-fluid">
		<nav class="pull-left">
			<ul>
				<li>
					<a href="{{ route('adminhome') }}">
						Home
					</a>
				</li>
			</ul>
		</nav>
		<p class="copyright pull-right">
			&copy;
			<script>
				document.write(new Date().getFullYear())
			</script>
			<a href="#"> {{ config('app.name') }} </a>, dibuat dengan cinta oleh DarkKerberos <3
		</p>
	</div>
</footer>
