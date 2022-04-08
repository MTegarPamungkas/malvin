@extends("layout/core")

@section("container")
    <div class="home-container container-fluid h-100 d-flex bg-dark">
        <div class="left-side-container d-flex justify-content-center align-items-center">

            <div class="left-side-text-container">
                <div class="title">
                    <h2 class="welcome-msg type-1">Welcome to <span class="text-primary brand-name"> V-Blogs</span>,</h2>
                    <h3 class="welcome-msg type-1">Educational Blogging App !</h3>
                </div>
                <div class="captions mt-4">
                    <p class="captions-msg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus sapiente et possimus aliquam officiis, quia nulla tempora facilis, unde expedita placeat necessitatibus blanditiis aperiam cumque. Iure explicabo est at in!</p>
                </div>
                <div class="button-link-container mt-4">
                    @auth
                        <a href="#" class="btn btn-outline-primary learn-more-btn">Learn More</a>
                    @else    
                        <a href="/login" class="btn btn-primary get-started-btn">Get Started</a>
                        <a href="#" class="btn btn-outline-primary learn-more-btn">Learn More</a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="right-side-container d-flex justify-content-center align-items-center">
            <div class="carousel-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/carousel-img/book-shadow.jpg" class="carousel-image d-block w-100">
                            <div class="carousel-caption">
                                <h4>“I shall be miserable if I have not an excellent library.”</h4>
                                <p>Jane Austen</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/carousel-img/book-container.jpg" class="carousel-image d-block w-100">
                            <div class="carousel-caption">
                                <h4>“That’s the thing about books. They let you travel without moving your feet.”</h4>
                                <p>Jhumpa Lahiri</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/carousel-img/book-container2.jpg" class="d-block w-100 carousel-image">
                            <div class="carousel-caption">
                                <h4>“Books are mirrors: you only see in them what you already have inside you.” </h4>
                                <p>Carlos Ruiz Zafón</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="neck-container container-fluid d-flex align-items-center justify-content-center">
        
        <div class="neck-item-container d-flex flex-column text-center">
            <div class="neck-logo">
                <img src="img/neck-img/cloud-book.svg" alt="" class="book-cartoon">
            </div>
            <div class="neck-title d-flex align-items-center justify-content-center">Online Book</div>
            <div class="neck-caption d-flex align-items-center"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p></div>
        </div>

        <div class="neck-item-container d-flex flex-column text-center">
            <div class="neck-logo">
                <img src="img/neck-img/customer-service.svg" alt="" class="customer-service">
            </div>
            <div class="neck-title d-flex align-items-center justify-content-center">Customer Service</div>
            <div class="neck-caption d-flex align-items-center"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p></div>
        </div>
        
        <div class="neck-item-container d-flex flex-column text-center">
            <div class="neck-logo">
                <img src="img/neck-img/truck.svg" alt="" class="book-cartoon">
            </div>
            <div class="neck-title d-flex align-items-center justify-content-center">Free Delivery</div>
            <div class="neck-caption d-flex align-items-center"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p></div>
        </div>

        <div class="neck-item-container d-flex flex-column text-center">
            <div class="neck-logo">
                <img src="img/neck-img/magnifier.svg" alt="" class="book-cartoon">
            </div>
            <div class="neck-title d-flex align-items-center justify-content-center">Research and Develop</div>
            <div class="neck-caption d-flex align-items-center"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p></div>
        </div>
    </div>

    <div class="about-us-container container-fluid bg-dark d-flex">
        <div class="about-us-left-container d-flex text-white">
            <div class="about-us-title-container">
                <h2 class="about-us-title">About Us</h2>
            </div>
            <div class="about-us-captions">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod itaque fugiat quisquam, voluptatem eligendi, impedit non doloremque error quidem, culpa rem suscipit voluptates quos ipsam natus nihil in tempore saepe ipsa voluptatibus.</p>
            </div>
            <div class="about-us-subcaptions">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus odit saepe voluptatum aliquid qui cupiditate soluta similique tempora ipsam rerum?</p>
            </div>
            <div class="about-us-buttons">
                <a href="#" class="btn btn-primary read-more-btn">Visit our Youtube</a>
            </div>
        </div>

        <div class="about-us-right-container d-flex justify-content-center align-items-center">
            <iframe class="video-player" src="https://www.youtube.com/embed/CXkjHLBr_y0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>
    </div>

    <div class="contact-container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h3>Give us feedback !</h3>
				<input type="text" class="field" placeholder="Your Name">
				<input type="text" class="field" placeholder="Your Email">
				<input type="text" class="field" placeholder="Phone">
				<textarea placeholder="Message" class="field"></textarea>
				<button class="btn">Send</button>
			</div>
		</div>
	</div>
@endsection

