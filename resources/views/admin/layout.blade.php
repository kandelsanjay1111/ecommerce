<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body class="animsition">
	<div class="page-wrapper">
		@include('admin.layouts.header')

		@include('admin.layouts.sidebar')
		<div class="page-container">

			@include('admin.layouts.header_desktop')

			<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    	@yield('content')
                    </div>
                </div>
            </div>
		</div>
	</div>
	@include('admin.layouts.script')
	@yield('script')
</body>
</html>