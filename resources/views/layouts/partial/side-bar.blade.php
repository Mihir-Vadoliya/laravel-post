<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="submenu">
					<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li>
							<a class="{{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard')}}"><span>Dashboard</span></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>