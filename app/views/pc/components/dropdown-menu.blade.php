<div class="menu-seleted" id="{{ isset($id)?$id : ''  }}">
	<span class="menu-selectd-text">{{ $title }}</span>
	<span class="menu-selected-arrow">
		<img src="/images/pc/userCenter/arrow.png">
	</span>
	<ul class="menu-list">
		@foreach($items as $item)
		<li class="item" value="{{ $item['value'] }}">{{ $item['text'] }}</li>
		@endforeach
	</ul>
</div>