<header class="header">
	<div class="left-icon">
		<img src="/images/back_arrow.png">
	</div>
	{{ $title }}
	
	@if(defined($rightIcon))
		<div class="right-icon">
			{{ $rightIcon }}
		</div>
	@endif
</header>