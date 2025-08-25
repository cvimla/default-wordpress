jQuery(document).ready(function($) {
    console.log('Shop scripts loaded');
    
    // Utility debounce function to limit rapid-fire events
    function debounce(func, wait = 600, immediate = false) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                func.apply(context, args);
            }, wait);
        };
    }

    // Initialize only on shop pages
    console.log('Body classes:', $('body').attr('class'));
    console.log('Has shop container:', $('.shop-container').length);
    console.log('Is page template shop:', $('body').hasClass('page-template-page-shop-php'));
    
    if (!$('body').hasClass('page-template-page-shop-php') && 
        !$('body').hasClass('woocommerce') && 
        !$('body').hasClass('archive') && 
        !$('.shop-container').length) {
        console.log('Not a shop page, exiting');
        return;
    }
    
    console.log('Initializing shop scripts');

    // Event listeners need to be re-bound after AJAX update
    function bindFilterEvents() {
        console.log('Binding filter events');
        // Handle category filter clicks
        $('input[name="category_filter"]').off('change').on('change', function() {
            console.log('Category filter changed');
            debouncedFilter();
        });

        // Optional: Add more event bindings here that should persist after AJAX
    }

    bindFilterEvents();
    
    // Initialize Price Slider
    function initPriceSlider(min, max) {
        console.log('Initializing price slider with min:', min, 'max:', max);
        
        if ($("#price-range-slider").length) {
            $("#price-range-slider").slider({
                range: true,
                min: min,
                max: max,
                values: [min, max],
                slide: function (event, ui) {
                    $("#price-range-display").text("₨" + ui.values[0] + " - ₨" + ui.values[1]);
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                },
                stop: function(event, ui) {
                    console.log('Slider stopped, filtering products');
                    filterProducts();
                }
            });
            
            $("#price-range-display").text("₨" + min + " - ₨" + max);
            $("#min_price").val(min);
            $("#max_price").val(max);
        } else {
            console.log('Price range slider element not found');
        }
    }
    
    // Initialize the slider with default values (will be updated with real values via AJAX)
    initPriceSlider(0, 10000);

    // Handle price filter form submission
    $('#price-filter-form').on('submit', function(e) {
        e.preventDefault();
        console.log('Price filter form submitted');
        filterProducts();
    });
    
    const debouncedFilter = debounce(function() {
        filterProducts();
    });

    function filterProducts() {
        // Check if required elements exist
        if (!$('input[name="category_filter"]').length && 
            !$('#min_price').length && 
            !$('#max_price').length) {
            console.log('Required filter elements not found');
            return;
        }
        
        const selectedCategory = $('input[name="category_filter"]:checked').val();
        const minPrice = $('#min_price').val();
        const maxPrice = $('#max_price').val();
        
        console.log('Filtering with category:', selectedCategory, 'min price:', minPrice, 'max price:', maxPrice);

        // Show loading spinner
        $('#loading-spinner').show();
        $('#products-grid').hide();

        // Build URL parameters
        const params = new URLSearchParams();
        if (selectedCategory) {
            params.append('category_filter', selectedCategory);
        }
        if (minPrice !== '') {
            params.append('min_price', minPrice);
        }
        if (maxPrice !== '') {
            params.append('max_price', maxPrice);
        }

        // Update URL without page reload
        const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.pushState({}, '', newUrl);

        // AJAX request to filter products
        if (typeof solarex_shop_ajax !== 'undefined') {
            $.ajax({
                url: solarex_shop_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'filter_products',
                    category_filter: selectedCategory,
                    min_price: minPrice,
                    max_price: maxPrice,
                    nonce: solarex_shop_ajax.nonce
                },
                success: function(response) {
                    console.log('Filter products response:', response);
                    $('#loading-spinner').hide();
                    $('#products-container').html(response);
                    $('#products-grid').show();

                    // Rebind events after AJAX load
                    bindFilterEvents();

                    // Re-initialize any needed components after AJAX update
                    initializeComponents();
                },
                error: function(xhr, status, error) {
                    $('#loading-spinner').hide();
                    $('#products-grid').show();
                    console.error('AJAX Error:', status, error);
                    alert('Something went wrong. Please try again.');
                }
            });
        } else {
            console.log('solarex_shop_ajax object not found during filtering');
        }

        // Store last sent category
        lastSentCategory = selectedCategory;
    }
    
    function initializeComponents() {
        // Any components that need re-initialization after AJAX updates
        console.log('Initializing components after AJAX update');
    }

    // Set initial filter state based on URL parameters
    if (typeof URLSearchParams !== 'undefined') {
        const urlParams = new URLSearchParams(window.location.search);
        const categoryParam = urlParams.get('category_filter');
        const minPriceParam = urlParams.get('min_price');
        const maxPriceParam = urlParams.get('max_price');

        if (categoryParam) {
            $('input[name="category_filter"][value="' + categoryParam + '"]').prop('checked', true);
        }

        // Set slider values and display based on URL parameters
        if (minPriceParam && maxPriceParam && $("#price-range-slider").length) {
            $("#price-range-slider").slider("values", [parseFloat(minPriceParam), parseFloat(maxPriceParam)]);
            $("#price-range-display").text("₨" + minPriceParam + " - ₨" + maxPriceParam);
            $("#min_price").val(minPriceParam);
            $("#max_price").val(maxPriceParam);
        }
    }
});