@extends('frontend.layout.master')

@section('content')
<section id="aa-catg-head-banner">
   <img src="{{asset('frontend/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{{$product->name}}</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
     </div>
   </div>
 </section>

 <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/media/'.$product->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$product->image)}}" class="simpleLens-big-image"></a><div class="simpleLens-lens-element"><img src="{{asset('frontend/demo/images/loading.gif')}}" style="margin-top: 175px;"></div></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                        @foreach($product->attributes as $attribute)
                          <a data-big-image="{{asset('storage/media/'.$attribute->image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img style="width:57px;" src="{{asset('storage/media/'.$attribute->image)}}">
                          </a>                                    
                        @endforeach
                          <!-- <a data-big-image="frontend/img/view-slider/medium/polo-shirt-3.png" data-lens-image="frontend/img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('frontend/img/view-slider/thumbnail/polo-shirt-3.png')}}">
                          </a> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product->name}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">${{$product->attributes[0]->price}}</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>{!!$product->short_desc!!}</p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      @foreach($product->attributes as $attribute)
                      <a href="#">{{$attribute->size->size}}</a>
                      @endforeach
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      @foreach($product->attributes as $attribute)
                      <a href="#" class="aa-color-{{$attribute->color->color}}"></a>
                      @endforeach
                      <!-- <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>                      
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>   -->                    
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">{{$product->category->category_name}}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#" id="add_to_cart">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider slick-initialized slick-slider"><button type="button" data-role="none" class="slick-prev slick-arrow slick-disabled" aria-label="Previous" role="button" aria-disabled="true" style="display: block;">Previous</button>
                <!-- start single product item -->
                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 2392px; left: 0px;"><li class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="0"><img src="{{asset('frontend/img/man/polo-shirt-2.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="0"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="0">Polo T-Shirt</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="0"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="0"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="0"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li><li class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="0"><img src="{{asset('frontend/img/women/girl-2.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="0"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="0">Lorem ipsum doller</a></h4>
                      <span class="aa-product-price">$45.50</span>
                    </figcaption>
                  </figure>                      
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="0"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="0"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="0"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                   <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li><li class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="0"><img src="{{asset('frontend/img/man/t-shirt-1.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="0"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  </figure>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#" tabindex="0">T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span>
                  </figcaption>
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="0"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="0"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="0"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                   <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li><li class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide03" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="0"><img src="{{asset('frontend/img/women/girl-3.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="0"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="0">Lorem ipsum doller</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="0"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="0"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="0"><span class="fa fa-search"></span></a>
                  </div>
                </li><li class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide04" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="-1"><img src="{{asset('frontend/img/man/polo-shirt-1.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="-1"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="-1">Polo T-Shirt</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                      
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="-1"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="-1"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="-1"><span class="fa fa-search"></span></a>
                  </div>
                </li><li class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide05" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="-1"><img src="{{asset('frontend/img/women/girl-4.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="-1"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="-1">Lorem ipsum doller</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="-1"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="-1"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="-1"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li><li class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide06" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="-1"><img src="{{asset('frontend/img/man/polo-shirt-4.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="-1"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="-1">Polo T-Shirt</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="-1"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="-1"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="-1"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li><li class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide07" style="width: 244px;">
                  <figure>
                    <a class="aa-product-img" href="#" tabindex="-1"><img src="{{asset('frontend/img/women/girl-1.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="#" tabindex="-1"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#" tabindex="-1">This is Title</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="-1"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare" tabindex="-1"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal" data-target="#quick-view-modal" data-original-title="Quick View" tabindex="-1"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li></div></div>
                 <!-- start single product item -->
                
                <!-- start single product item -->
                
                <!-- start single product item -->
                
                <!-- start single product item -->
                
                <!-- start single product item -->
                    
                <!-- start single product item -->
                 
                <!-- start single product item -->
                                                                                                   
              <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;" aria-disabled="false">Next</button></ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <form id="cart_form" action="{{route('cart.add')}}" method="POST">
    @csrf
    <input type="hidden" value="{{$product->id}}" name="product_id">
    <input type="hidden" value="{{$product->name}}" name="product_name">
    <input type="hidden" value="1" name="quantity">
    <input type="hidden" value="{{$product->attributes[0]->color->color}}" name="color">
    <input type="hidden" value="{{$product->attributes[0]->size->size}}" name="size">
    <input type="hidden" value="{{$product->attributes[0]->price}}" name="price">
    <input type="hidden" value="{{$product->attributes[0]->id}}" name="attr_id">
  </form>
  <script type="text/javascript">
    const cart_button=document.getElementById('add_to_cart');
    cart_button.addEventListener('click',function(event){
      event.preventDefault();
      document.getElementById('cart_form').submit();
    });
  </script>
@endsection


