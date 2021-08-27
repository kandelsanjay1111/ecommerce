  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{route('home')}}">Home</a></li>
              @foreach($navlinks as $category)
              @if($category->subcategory->count()>0)
              <li><a href="#">{{$category->category_name}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  @foreach($category->subcategory as $subcategory)
                  <li><a href="">{{$subcategory->category_name}}</a></li>
                  @endforeach
                </ul>
              </li>
              @else
              <li><a href="#">{{$category->category_name}}</a></li>
              @endif
              @endforeach
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->