<x-navbar>
    <style>
        .custom-btn {
            background-color: #445fc1;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #6a0dad;
            /* Darker purple for hover effect */
            color: #fff;
        }
    </style>
    <!-- Banner Section with Bootstrap Carousel -->
    <section class="banner-section">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center align-items-center"
                        style="height: 300px; background-color: #445fc1; color: white;">
                        <div class="text-center">
                            <h1 style="font-size: 3rem;">10% OFF ON EVERYTHING</h1>
                            <p>USE CODE: HTZER004</p>
                            <a href="{{route('Shop')}}" class="btn btn-light">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center align-items-center"
                        style="height: 300px; background-color: #343a40; color: white;">
                        <div class="text-center">
                            <h1 style="font-size: 3rem;">Special Sale on Shoes</h1>
                            <p>Up to 50% OFF</p>
                            <a href="{{route('Shop')}}" class="btn btn-light">Shop Shoes</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center align-items-center"
                        style="height: 300px; background-color: #5a6268; color: white;">
                        <div class="text-center">
                            <h1 style="font-size: 3rem;">New Arrivals</h1>
                            <p>Shop the Latest Collection</p>
                            <a href="{{route('Shop')}}" class="btn btn-light">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Product Section -->
    <!-- Product Section -->
    <section class="product-section" style="padding: 50px 0;">
        <div class="product-grid" style="display: flex; justify-content: space-around; gap: 20px; flex-wrap: wrap;">
            <div class="product-item text-center">
                <img src="https://zandokh.com/image/cache/catalog/products/2024-07/2122405405/Sandles%20(1)-cr-450x672.jpg"
                    alt="Product 1" style="width: 200px;">
                <p>Shop Shoes</p>
                <a href="{{route('Shop')}}" class="btn custom-btn">Shop Now</a>
            </div>
            <div class="product-item text-center">
                <img src="https://zandokh.com/image/cache/catalog/products/2024-07/2122405381/New/T-Shirt%20(3)-cr-450x672.jpg"
                    alt="Product 2" style="width: 200px;">
                <p>Shop Clothes</p>
                <a href="{{route('Shop')}}" class="btn custom-btn">Shop Now</a>
            </div>
            <div class="product-item text-center">
                <img src="https://zandokh.com/image/cache/catalog/products/2024-09/2522408414/Fanny%20Bags%20(1)-cr-450x672.jpg"
                    alt="Product 3" style="width: 200px;">
                <p>Shop Bags</p>
                <a href="#" class="btn custom-btn">Shop Now</a>
            </div>
            <div class="product-item text-center">
                <img src="https://zandokh.com/image/cache/catalog/products/2024-07/2522405419/Cap%20(1)-cr-450x672.jpg"
                    alt="Product 4" style="width: 200px;">
                <p>Shop Accessories</p>
                <a href="{{route('Shop')}}" class="btn custom-btn">Shop Now</a>
            </div>
        </div>
    </section>


    <!-- Promotion Section -->
    <section class="promotion-section" style="text-align: center; padding: 30px 0; background-color: #f4f4f4;">
        <h2>10% OFF ON EVERYTHING</h2>
        <p>USE CODE: HTZER004</p>
        <a href="{{route('Shop')}}" class="btn btn-dark">Shop Now</a>
    </section>

    <!-- New Arrivals Section -->
    <section class="new-arrivals" style="padding: 50px 0;">
        <div style="text-align: center;">
            <h2>Shop New Arrivals</h2>
            <section class="product-section" style="padding: 50px 0;">
                <div class="product-grid"
                    style="display: flex; justify-content: space-around; gap: 20px; flex-wrap: wrap;">
                    <div class="product-item text-center">
                        <img src="https://zandokh.com/image/cache/catalog/products/2024-09/2122406662/Jeans%20(2)-cr-450x672.jpg"
                            alt="Product 1" style="width: 200px;">
                    </div>
                    <div class="product-item text-center">
                        <img src="https://zandokh.com/image/cache/catalog/products/2024-09/2122406736/Straight-Fit-Trouser%20(2)-cr-450x672.jpg"
                            alt="Product 2" style="width: 200px;">
                    </div>
                    <div class="product-item text-center">
                        <img src="https://zandokh.com/image/cache/catalog/products/2024-09/2522408415/Crossbody%20Bags%20(1)-cr-450x672.jpg "
                            alt="Product 3" style="width: 200px;">
                    </div>
                    <div class="product-item text-center">
                        <img src="https://zandokh.com/image/cache/catalog/products/2024-04/2522403410/Sneakers%20(1)-cr-450x672.jpg"
                            alt="Product 4" style="width: 200px;">
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Client Reviews Section -->
    <section class="client-reviews" style="padding: 50px 0;">
        <h2 style="text-align: center;">Client Reviews</h2>
        <div style="display: flex; justify-content: center; gap: 30px; padding-top: 20px;">
            <div class="review-card" style="width: 200px; text-align: center; padding: 20px; border: 1px solid #ddd;">
                <p>⭐⭐⭐⭐⭐</p>
                <p>"Great product and service!"</p>
                <p>Jane Doe</p>
            </div>
            <div class="review-card" style="width: 200px; text-align: center; padding: 20px; border: 1px solid #ddd;">
                <p>⭐⭐⭐⭐⭐</p>
                <p>"Quality shoes, I’ll definitely buy again."</p>
                <p>John Smith</p>
            </div>
        </div>
    </section>
</x-navbar>
