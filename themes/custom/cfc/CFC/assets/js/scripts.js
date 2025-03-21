(function ($) {
  $(document).ready(function () {
    //Search
    // Get the text from the span and set it as the input value
    // var spanText = $('#search-term').text();
    // $('#edit-keys--2').val(spanText);
    // var spanText = $('#search-term').text().trim();
    // $('#edit-keys--2').val(spanText);

    //
    // $(".slider-content h2 span , .slider-content h2").each(function () {
    //   let text = $(this).text().toLowerCase(); // Convert all text to lowercase
    //   let formattedText = text.charAt(0).toUpperCase() + text.slice(1); // Capitalize the first letter
    //   $(this).text(formattedText); // Update the element's text
    // });
    // Sidebar navigation
    $('.sidebar a').on('click', function (e) {
      e.preventDefault();

      // Remove active class from all sidebar links and add to clicked one
      $('.sidebar a').removeClass('active');
      $(this).addClass('active');

      // Show the corresponding content
      const target = $(this).attr('href');
      $('.content').removeClass('active');
      $(target).addClass('active');

      // Reset top tabs inside the active content
      $(target).find('.top-tabs button').removeClass('active').first().addClass('active');
      $(target).find('.tab-content').removeClass('active').first().addClass('active');
    });

    // Top tabs navigation
    $('.top-tabs button').on('click', function () {
      const parentContent = $(this).closest('.content');

      // Remove active class from all top tabs and add to clicked one
      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      // Show the corresponding tab content
      const targetTab = $(this).data('tab');
      parentContent.find('.tab-content').removeClass('active');
      parentContent.find('#' + targetTab).addClass('active');
    });
    // Sticky Header on Scroll
    $(window).scroll(function () {
      var scrollTop = $(window).scrollTop();
      var $mainMenu = $('header');

      if (scrollTop > 0) {
        $mainMenu.addClass('is-sticky').css({
          'position': 'fixed',
          'width': '100%',
          'left': '0',
          'top': '0'
        });
      } else {
        $mainMenu.removeClass('is-sticky').removeAttr('style');
      }
    });

    // Counter Animation
    $('.counter').each(function () {
      const $this = $(this);
      const target = +$this.data('target');
      $({
        countNum: $this.text()
      }).animate({
        countNum: target
      }, {
        duration: 2000,
        easing: 'linear',
        step: function () {
          $this.text(Math.floor(this.countNum).toLocaleString());
        },
        complete: function () {
          $this.text(this.countNum.toLocaleString());
        }
      });
    });

    // Accordion Toggle
    $('.african_pioneer .accordion .card').click(function () {
      $('.african_pioneer .accordion .card').not(this).removeClass('active').find('.card-body').slideUp();
      $(this).toggleClass('active').find('.card-body').slideToggle();
      const attributeValue = $(this).data('attribute');
      console.log('Clicked card attribute:', attributeValue);
    });

    // Owl Carousel Initialization
    $('.banner_status_slider .owl-carousel').owlCarousel({
      // // stagePadding: 400,
      // // loop: true,
      // // items: 3,
      // // center:true,
      // // lazyLoad: true,
      // // autoplay: false,
      // // autoplaySpeed: 2000,
      // // autoplayTimeout: 5000,
      // // autoplayHoverPause: true,
      // // dots: false,
      // // responsive: {
      // //   0: {
      // //     items: 1,
      // //     stagePadding: null,

      // //   },
      // //   600: {
      // //     items: 1,
      // //     stagePadding: null,
      // //   },
      // //   1000: {
      // //     items: 3,

      // //   }
      // }
      stagePadding: 300,
      loop: true,
      items: 1,
      lazyLoad: true,
      autoplay: false,
      // margin: 30,
      autoplaySpeed: 2000,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      autoHeight: false,
      responsive: {
        0: {
          items: 1,
          stagePadding: true, // Reduce padding for mobile
          autoHeight: true,
        },
        600: {
          items: 1,
          stagePadding: true, // Adjust padding based on screen size
          autoHeight: true,
        },
        1000: {
          stagePadding: 200,
          items: 1,

        }
      }

    });

    // // Generate Alphabet Filter Buttons
    // const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
    // const filterContainer = $("#filter");
    // const articles = $(".article");

    // alphabet.forEach(letter => {
    //   const button = $("<button>").text(letter);
    //   button.on("click", function () {
    //     filterArticles(letter, $(this));
    //   });
    //   filterContainer.append(button);
    // });

    // articles.show(); // Show all articles by default
    // function filterArticles(letter, button) {
    //   $(".filter button").removeClass("active");
    //   button.addClass("active");
    //   articles.each(function () {
    //     const title = $(this).data("title");
    //     if (title.startsWith(letter)) {
    //       $(this).show();
    //     } else {
    //       $(this).hide();
    //     }
    //   });
    // }
    const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
    const filterContainer = $("#filter");
    const articles = $(".section---filter-block .article");

    // Function to generate filter buttons
    alphabet.forEach(letter => {
      const button = $("<button>").text(letter);
      button.on("click", function () {
        filterArticles(letter, $(this));
      });
      filterContainer.append(button);
    });

    // Initialize Owl Carousel
    const owl = $(".section---filter-block .owl-carousel").owlCarousel({
      items: 4, // Number of items to show
      loop: false,
      nav: true,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });

    // Function to filter articles based on the selected letter
    function filterArticles(letter, button) {
      $(".filter button").removeClass("active");
      button.addClass("active");

      // Hide all articles first
      articles.hide();

      // Filter articles based on the selected letter
      const filteredArticles = articles.filter(function () {
        const title = $(this).data("title");
        return title.startsWith(letter);
      });

      // Show filtered articles
      filteredArticles.show();

      // Destroy and reinitialize Owl Carousel with filtered items
      owl.trigger('destroy.owl.carousel');
      owl.html(filteredArticles);
      owl.owlCarousel({
        items: 4,
        loop: false,
        nav: true,
        dots: false,
        responsive: {
          0: {
            items: 1, // Show 1 item
            nav: false, // Hide navigation arrows
            autoplay: true, // Enable autoplay
            stagePadding: 0, // Ensure no padding
            margin: 0 // Ensure no margin between items
          },
          600: {
            items: 2,
            nav: false,
            autoplay: true
          },
          1000: {
            items: 4
          }
        }
      });
    }

    // Set the "A" button to active on page load and filter articles starting with "A"
    const firstButton = $("button").filter(function () {
      return $(this).text() === "A"; // Find the "A" button
    });

    if (firstButton.length) {
      filterArticles("A", firstButton); // Trigger filter for "A"
    }
    // ***************
    // // Generate Alphabet Filter Buttons
    // const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
    // const filterContainer = $("#filter");
    // const articles = $(".article");

    // // Function to generate filter buttons
    // alphabet.forEach(letter => {
    //   const button = $("<button>").text(letter);
    //   button.on("click", function () {
    //     filterArticles(letter, $(this));
    //   });
    //   filterContainer.append(button);
    // });

    // // Show all articles by default when the page loads
    // articles.show();

    // // Function to filter articles based on the selected letter
    // function filterArticles(letter, button) {
    //   $(".filter button").removeClass("active");
    //   button.addClass("active");

    //   articles.each(function () {
    //     const title = $(this).data("title");
    //     if (title.startsWith(letter)) {
    //       $(this).show();
    //     } else {
    //       $(this).hide();
    //     }
    //   });
    // }

    // // Set the "A" button to active on page load and filter articles starting with "A"
    // $(document).ready(function () {
    //   const firstButton = $("button").filter(function () {
    //     return $(this).text() === "A"; // Find the "A" button
    //   });

    //   if (firstButton.length) {
    //     filterArticles("A", firstButton); // Trigger filter for "A"
    //   }
    // });

    // **************** 6666666
    // $('.members').slick({
    //   dots: true,
    //   infinite: false,
    //   speed: 300,
    //   slidesToShow: 7,
    //   slidesToScroll: 7,
    //   variableWidth: true,
    //   responsive: [{
    //     breakpoint: 768, // Define the breakpoint for smaller screens (e.g., tablets and phones)
    //     settings: {
    //       slidesToShow: 1, // Show only one slide
    //       slidesToScroll: 1, // Scroll one slide at a time
    //       variableWidth: false,

    //     }
    //   }]
    // });

    // // Custom Dropdown Logic
    // const $customSelect = $('#country-select');
    // const $selectedDiv = $customSelect.find('.select-selected');
    // const $itemsDiv = $customSelect.find('.select-items');

    // // Toggle dropdown visibility
    // $selectedDiv.on('click', function () {
    //   $customSelect.toggleClass('open');
    // });

    // // Handle option selection
    // $itemsDiv.on('click', 'div[data-value]', function () {
    //   const $option = $(this);
    //   const value = $option.data('value');
    //   const flagHtml = $option.find('img').prop('outerHTML');
    //   const countryName = $option.find('span').text();

    //   // Update the selected display
    //   $selectedDiv.html(`${flagHtml} <span>${countryName}</span>`);

    //   // Close dropdown
    //   $customSelect.removeClass('open');

    //   // Trigger custom change event
    //   $customSelect.trigger('change', {
    //     value
    //   });
    // });

    // // Close dropdown when clicking outside
    // $(document).on('click', function (e) {
    //   if (!$customSelect.is(e.target) && $customSelect.has(e.target).length === 0) {
    //     $customSelect.removeClass('open');
    //   }
    // });

    // // Update filtering logic to use the custom dropdown
    // $customSelect.on('change', function (e, data) {
    //   const selectedCountry = data.value;

    //   // Filter members based on selected country
    //   $('.member').each(function () {
    //     const memberCountry = $(this).data('country');

    //     if (!selectedCountry || memberCountry === selectedCountry) {
    //       $(this).removeClass('hidden');
    //     } else {
    //       $(this).addClass('hidden');
    //     }
    //   });

    //   // Update container visibility
    //   if ($('.member.hidden').length > 0) {
    //     $('.members').addClass('hidden_show');
    //   } else {
    //     $('.members').removeClass('hidden_show');
    //   }
    // });

    // // Additional Filters (Search and Category)
    // $('#searchFilter').on('input', function () {
    //   const searchTerm = $(this).val().toLowerCase();

    //   $('.member').each(function () {
    //     const title = $(this).find('.parnet--title').text().toLowerCase();
    //     if (title.includes(searchTerm)) {
    //       $(this).removeClass('hidden');
    //     } else {
    //       $(this).addClass('hidden');
    //     }
    //   });

    //   if ($('.member.hidden').length > 0) {
    //     $('.members').addClass('hidden_show');
    //   } else {
    //     $('.members').removeClass('hidden_show');
    //   }
    // });

    // $('.categoryFilter').on('click', function () {
    //   $('.categoryFilter').removeClass('active');
    //   $(this).addClass('active');

    //   const selectedCategory = $(this).data('category');

    //   $('.member').each(function () {
    //     const memberCategory = $(this).data('category');

    //     if (selectedCategory === 'all' || memberCategory === selectedCategory) {
    //       $(this).removeClass('hidden');
    //     } else {
    //       $(this).addClass('hidden');
    //     }
    //   });

    //   if ($('.member.hidden').length > 0) {
    //     $('.members').addClass('hidden_show');
    //   } else {
    //     $('.members').removeClass('hidden_show');
    //   }
    // });

    // // Set default category filter
    // $('.categoryFilter[data-category="all"]').addClass('active');
    // // 66666666
    // Slick Carousel Initialization
    // Initialize Slick Carousel
    // $('.members').slick({
    //   dots: true,
    //   infinite: false,
    //   speed: 300,
    //   slidesToShow: 10,
    //   slidesToScroll: 10,
    //   variableWidth: true,
    //   appendDots: $('.slick-dots-container'),
    //   appendArrows: $('.slider-navigation'),
    //   prevArrow: $('.slick-prev'),
    //   nextArrow: $('.slick-next'),
    //   responsive: [{
    //     breakpoint: 768, // Define the breakpoint for smaller screens
    //     settings: {
    //       slidesToShow: 1, // Show only one slide
    //       slidesToScroll: 1, // Scroll one slide at a time
    //       variableWidth: false,
    //     }
    //   }]
    // });
// Initialize Slick Slider
function initializeSlick(autoplay = true) {
  // Destroy existing Slick instance
  if ($('.members').hasClass('slick-initialized')) {
    $('.members').slick('unslick');
  }

  // Initialize Slick slider with visible members
  const visibleMembers = $('.member:not(.hidden)');

  // Check if there are visible members
  if (visibleMembers.length > 0) {
    $('.members').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 10, // Show 10 members per slide
      slidesToScroll: 10, // Move by 10 members per scroll
      variableWidth: false,
      appendDots: $('.slick-dots-container'), // Custom container for dots
      appendArrows: $('.slider-navigation'), // Custom container for arrows
      prevArrow: $('.slick-prev'), // Custom prev arrow
      nextArrow: $('.slick-next'), // Custom next arrow
      autoplay: autoplay, // Dynamically set autoplay
      autoplaySpeed: 3000, // Set autoplay speed to 3 seconds (3000ms)
      responsive: [{
        breakpoint: 768, // Breakpoint for smaller screens
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          variableWidth: false,
        }
      }]
    });

    // Update dots based on visible members
    updateSlickDots();

    // Highlight active dot on slide change
    $('.members').on('afterChange', function (event, slick, currentSlide) {
      highlightActiveDot();
    });
  } else {
    // Hide slider if no visible members
    $('.members').addClass('hidden_show');
  }
}

// Update Slick Dots Dynamically
function updateSlickDots() {
  const $slickDots = $('.slick-dots-container .slick-dots');
  if ($slickDots.length > 0) {
    const totalSlides = $('.member:not(.hidden)').length;
    const slidesToShow = 10; // Adjust this to move by 10 members
    const totalDots = Math.ceil(totalSlides / slidesToShow);

    // Clear existing dots
    $slickDots.empty();

    // Add new dots based on the number of visible slides
    for (let i = 0; i < totalDots; i++) {
      const dot = $(`<li><button>${i + 1}</button></li>`);
      dot.on('click', function () {
        // Move the slider to the corresponding slide, by 10 members per dot
        $('.members').slick('slickGoTo', i * slidesToShow);
      });
      $slickDots.append(dot);
    }

    // Highlight the active dot
    highlightActiveDot();
  }
}

// Highlight Active Dot
function highlightActiveDot() {
  const $slickDots = $('.slick-dots-container .slick-dots li');
  const currentSlide = $('.members').slick('slickCurrentSlide');
  const slidesToShow = 10; // Adjust based on your slidesToShow setting
  const activeDotIndex = Math.floor(currentSlide / slidesToShow);

  // Remove active class from all dots
  $slickDots.removeClass('slick-active');

  // Add active class to the current dot
  $slickDots.eq(activeDotIndex).addClass('slick-active');
}

// Apply Filters
function applyFilters() {
  const selectedCountry = $countrySelect.find('.select-selected').data('value');
  const selectedCategory = $industrySelect.find('.select-selected').data('category');
  const searchTerm = $('#searchFilter').val().toLowerCase();

  let visibleMembersCount = 0;

  // Filter members based on selected filters
  $('.member').each(function () {
    const memberCountry = $(this).data('country');
    const memberCategory = $(this).data('category');
    const title = $(this).find('.parnet--title').text().toLowerCase();

    // Check if "All countries" or "All industries" is selected
    const matchesCountry = selectedCountry === 'all' || !selectedCountry || memberCountry === selectedCountry;
    const matchesCategory = selectedCategory === 'all' || !selectedCategory || memberCategory === selectedCategory;
    const matchesSearch = !searchTerm || title.includes(searchTerm);

    if (matchesCountry && matchesCategory && matchesSearch) {
      $(this).removeClass('hidden');
      visibleMembersCount++;
    } else {
      $(this).addClass('hidden');
    }
  });

  // Show or hide the no members message
  const $noMembersMessage = $('#no-members-message');
  if (visibleMembersCount === 0) {
    $noMembersMessage.removeClass('hidden');
    $('.members').addClass('hidden_show');
  } else {
    $noMembersMessage.addClass('hidden');
    $('.members').removeClass('hidden_show');
  }

  // Reinitialize Slick with autoplay set to false
  $('.members').slick('unslick'); // Destroy the current instance
  initializeSlick(false); // Pass false to disable autoplay
}

// Dropdown Logic for Country and Industry
const $countrySelect = $('#country-select');
$countrySelect.find('.select-selected').on('click', function () {
  $countrySelect.toggleClass('open');
});
$countrySelect.find('.select-items').on('click', 'div[data-value]', function () {
  const $option = $(this);
  const value = $option.data('value');
  const flagHtml = $option.find('img').prop('outerHTML');
  const countryName = $option.find('span').text();

  $countrySelect.find('.select-selected')
    .html(`${flagHtml} <span>${countryName}</span>`)
    .data('value', value);

  $countrySelect.removeClass('open');
  applyFilters(); // Trigger filtering
});

const $industrySelect = $('#industry-select');
$industrySelect.find('.select-selected').on('click', function () {
  $industrySelect.toggleClass('open');
});
$industrySelect.find('.select-items').on('click', 'div[data-category]', function () {
  const $option = $(this);
  const category = $option.data('category');
  const categoryName = $option.find('span').text();

  $industrySelect.find('.select-selected')
    .html(`<span>${categoryName}</span>`)
    .data('category', category);

  $industrySelect.removeClass('open');
  applyFilters(); // Trigger filtering
});

// Search Input Logic
$('#searchFilter').on('input', function () {
  applyFilters(); // Trigger filtering
});

// Initialize Slick on page load
$(document).ready(function () {
  initializeSlick();
});

    // ****************
    // var memberCount = $('.members .member').length;

    // // If more than 7 members, initialize Owl Carousel
    // if (memberCount > 7) {
    //   $('.members').addClass('owl-carousel').owlCarousel({
    //     items: 4, // You can customize the number of items shown here
    //     loop: false,
    //     margin: 10,
    //     nav: true,
    //     dots: false,
    //     autoWidth: true,

    //     responsive: {
    //       0: {
    //         items: 1
    //       },
    //       600: {
    //         items: 2
    //       },
    //       1000: {
    //         items: 4
    //       }
    //     }
    //   });
    // } else {
    //   // If there are 7 or fewer members, remove the owl-carousel class (in case it was applied)
    //   $('.members').removeClass('owl-carousel');
    // }
    //    display: "block",
    //     left: e.pageX + 10 + "px",
    //     top: e.pageY + 10 + "px",
    //   });

    //   // Update content dynamically
    //   $hoverBox.find("#country-name").text(country);
    //   $hoverBox.find("#download-link").text(factSheet);
    // });

    // $(".path-hover").on("mousemove", function (e) {
    //   $hoverBox.css({
    //     left: e.pageX + 10 + "px",
    //     top: e.pageY + 10 + "px",
    //   });
    // });

    // $(".path-hover").on("mouseleave", function () {
    //   timeout = setTimeout(() => {
    //     $hoverBox.css("display", "none");
    //   }, 300); // Delay hiding for smoother interaction
    // });

    // $hoverBox.on("mouseenter", function () {
    //   clearTimeout(timeout); // Keep the tooltip visible when mouse enters it
    // });

    // $hoverBox.on("mouseleave", function () {
    //   $hoverBox.css("display", "none");
    // });
    //
    // ************* Start MAPS


    // Function to show item-info
    // function showItemInfo(item, country, factSheet, factSheet_img) {
    //   // Create the content for the .item-info modal
    //   const content = `
    //     <div class="item-info-content">
    //       <div class="flag--element">
    //         <img src="${factSheet_img}" alt="Fact Sheet Flag">
    //       </div>
    //       <div class="wrapper-element-africa">
    //         <div>${country}</div>

    //            <div  class="click--modal-hp">Download the country facts sheet</div>
    //       </div>
    //     </div>
    //   `;

    //   // Find or create the .item-info modal
    //   let itemInfo = $('.item-info');
    //   if (itemInfo.length === 0) {
    //     itemInfo = $('<div class="item-info"></div>').appendTo('body');
    //   }

    //   itemInfo.html(content).show();

    //   // Get the position of the item relative to the document
    //   const pathOffset = item.offset();
    //   const windowWidth = $(window).width();
    //   const itemInfoWidth = itemInfo.outerWidth();
    //   const itemInfoHeight = itemInfo.outerHeight();

    //   // Position the modal above the item
    //   itemInfo.css({
    //     top: pathOffset.top - itemInfoHeight - 10, // Position above the item
    //     left: pathOffset.left,
    //     position: 'absolute',
    //   });

    //   // Check if the modal is off-screen on the left or right and adjust its position
    //   if (itemInfo.offset().left < 0) {
    //     itemInfo.css('left', 10); // Adjust to the left side of the viewport
    //   } else if (itemInfo.offset().left + itemInfoWidth > windowWidth) {
    //     itemInfo.css('left', windowWidth - itemInfoWidth - 10); // Adjust to the right side of the viewport
    //   }
    // }

    // // Handle hover or click on .item-wrap elements
    // $('.item-wrap').on('mouseenter click', function () {
    //   const country = $(this).data('country');
    //   const factSheet = $(this).data('fact-sheet');
    //   const factSheet_img = $(this).data('fact-img'); // Retrieve the fact sheet image link

    //   showItemInfo($(this), country, factSheet, factSheet_img);
    // });

    // // Handle the select dropdown interaction
    // $('#country-select .select-items div').on('click', function () {
    //   const country = $(this).data('country');

    //   // Find the corresponding SVG path for the selected country
    //   const path = $(`.map-container [data-country="${country}"]`);

    //   if (path.length) {
    //     // Extract data from the SVG path
    //     const factSheet = path.data('fact-sheet'); // Get the fact sheet link from the path
    //     const factSheet_img = path.data('fact-img'); // Get the flag image link from the path

    //     // Show the modal positioned relative to the path
    //     showItemInfo(path, country, factSheet, factSheet_img);
    //   }

    //   // Update the selected item display
    //   const selectedHtml = $(this).html(); // Get the HTML of the clicked item
    //   $('#country-select .select-selected').html(selectedHtml);
    // });

    // // Hide modal on mouse leave
    // $(document).on('mouseleave', '.map-container, .item-info', function (event) {
    //   if (
    //     !$(event.relatedTarget).closest('.item-info').length &&
    //     !$(event.relatedTarget).closest('.map-container').length
    //   ) {
    //     $('.item-info').hide();
    //   }
    // });

    // Function to show item info and add class to the clicked path
    function showItemInfo(item, country, factSheet, factSheet_img) {
      const content = `
        <div class="item-info-content">
          <div class="flag--element">
            <img src="${factSheet_img}" alt="Fact Sheet Flag">
          </div>
          <div class="wrapper-element-africa">
            <div>${country}</div>
            <div class="click--modal-hp" data-pdf="${factSheet}">Download the country facts sheet</div>
          </div>
        </div>
      `;

      let itemInfo = $('.item-info');
      if (itemInfo.length === 0) {
        itemInfo = $('<div class="item-info"></div>').appendTo('body');
      }

      itemInfo.html(content).show();

      // Get the position of the item relative to the document
      const pathOffset = item.offset();
      const windowWidth = $(window).width();
      const itemInfoWidth = itemInfo.outerWidth();
      const itemInfoHeight = itemInfo.outerHeight();

      // Position the modal above the item
      itemInfo.css({
        top: pathOffset.top - itemInfoHeight - 10,
        left: pathOffset.left,
        position: 'absolute',
      });

      if (itemInfo.offset().left < 0) {
        itemInfo.css('left', 10);
      } else if (itemInfo.offset().left + itemInfoWidth > windowWidth) {
        itemInfo.css('left', windowWidth - itemInfoWidth - 10);
      }

      // Modal click logic for ".click--modal-hp"
      $(".click--modal-hp").off("click").on("click", function () {
        const factSheetLink = $(this).data("pdf");

        // Update the download link dynamically
        $("#download-link").attr("href", factSheetLink);

        // Update the input field value dynamically
        $("#edit-pdf").val(factSheetLink);

        // Show the member modal
        $("#member-modal").fadeIn();

        // Close modal functionality
        $(".showing_modal_pop_up .close").off("click").on("click", function () {
          $(".showing_modal_pop_up").fadeOut();
          $("#access-password").val("");
          $("#error-message").hide();
        });

        // Handle non-member button click
        $("#not-member-btn").off("click").on("click", function () {
          $("#member-modal").hide();
          $("#non-member-modal").fadeIn();
        });

        // Switch to member modal
        $("#already-member-btn").off("click").on("click", function () {
          $("#non-member-modal").hide();
          $("#member-modal").fadeIn();
        });

        // Remove the disabled attribute so the button is clickable
        $("#download-btn").prop("disabled", false);

        // Handle download button click
        const correctPassword = "CFC123";
        $("#download-btn").off("click").on("click", function (event) {
          const enteredPassword = $("#access-password").val();
          if (enteredPassword !== correctPassword) {
            event.preventDefault();
            $("#error-message").text("Wrong password, please try again").show();
          } else {
            $("#error-message").hide();
          }
        });
      });


    }

    // Handle click on .item-wrap elements
    $('.item-wrap').on('click', function () {
      const country = $(this).data('country');
      const factSheet = $(this).data('fact-sheet');
      const factSheet_img = $(this).data('fact-img');

      // Remove "color---path" class from all paths
      $('.item-wrap').removeClass('color---path');

      // Add "color---path" class to the clicked path
      $(this).addClass('color---path');

      showItemInfo($(this), country, factSheet, factSheet_img);
    });

    // Handle the select dropdown interaction
    $('#country-select .select-items div').on('click', function () {
      const country = $(this).data('country');

      // Find the corresponding SVG path for the selected country
      const path = $(`.map-container [data-country="${country}"]`);

      if (path.length) {
        // Remove "color---path" class from all paths
        $('.map-container [data-country]').removeClass('color---path');

        // Add "color---path" class to the clicked path
        path.addClass('color---path');

        // Extract data from the SVG path
        const factSheet = path.data('fact-sheet'); // Get the fact sheet link from the path
        const factSheet_img = path.data('fact-img'); // Get the flag image link from the path

        // Show the modal positioned relative to the path
        showItemInfo(path, country, factSheet, factSheet_img);
      }

      // Update the selected item display
      const selectedHtml = $(this).html(); // Get the HTML of the clicked item
      $('#country-select .select-selected').html(selectedHtml);
    });





    // ************* END MAPS
    // ************* Start MAPS 2
    // Function to show item-info
    // function showItemInfo_1(item, factSheet_img_1, subtitle) {
    //   // Create the content for the item-info modal
    //   const content =
    //     `<div class="item-info-content" id="about_maps_1">
    //           <div class="flag--element">
    //               <img src="${factSheet_img_1}" alt="Fact Sheet Flag">
    //           </div>
    //           <div class="wrapper-element-africa">
    //           <span clss="test">${subtitle}</span>
    //               <div class="tabs---1">1111 To get in touch with this international financial center, please enter your email address</div>
    //               <div class="tabs---2">2222 To get in touch with this investment promotion agency, please enter your email address</div>
    //               <form class="d-flex mt-3">
    //                   <input type="email" class="form-control rounded-pill" placeholder="Email.." required="">
    //                   <button type="submit" class="form--news">Submit <i class="fas fa-arrow-right ms-2"></i></button>
    //               </form>
    //           </div>
    //       </div>`;

    //   // Find or create the .item-info modal
    //   let itemInfo = $('.item-info');
    //   if (itemInfo.length === 0) {
    //     itemInfo = $('<div class="item-info about_maps_1"></div>').appendTo('body');
    //   }

    //   itemInfo.html(content).show();

    //   // Get the position of the item relative to the document
    //   const pathOffset = item.offset();
    //   const windowWidth = $(window).width();
    //   const itemInfoWidth = itemInfo.outerWidth();
    //   const itemInfoHeight = itemInfo.outerHeight();

    //   // Position the modal above the item
    //   itemInfo.css({
    //     top: pathOffset.top - itemInfoHeight - 10, // Position above the item
    //     left: pathOffset.left,
    //     position: 'absolute',
    //   });

    //   // Check if the modal is off-screen on the left or right side and adjust position if necessary
    //   if (itemInfo.offset().left < 0) {
    //     itemInfo.css('left', 10); // Adjust to the left side of the viewport
    //   } else if ((itemInfo.offset().left + itemInfoWidth) > windowWidth) {
    //     itemInfo.css('left', windowWidth - itemInfoWidth - 10); // Adjust to the right side of the viewport
    //   }
    // }

    // // When the user hovers over the item with the class "item-wrap-1"
    // $('.maps___1 .item-wrap-1 , .maps___2 .item-wrap-1').on('mouseenter click', function () {
    //   const factSheet_img_1 = $(this).data('logo');
    //   // Retrieve the fact sheet image link
    //   // Pass the data to the showItemInfo_1 function
    //   const subtitle = $(this).data('subtitle');
    //   showItemInfo_1($(this), factSheet_img_1, subtitle);
    // });

    // // When the mouse leaves the .map-container or .item-info, hide the modal
    // $(document).on('mouseleave', '.map-container, .item-info', function (event) {
    //   // Check if the mouse has really left the map-container or item-info
    //   if (!$(event.relatedTarget).closest('.item-info').length && !$(event.relatedTarget).closest('.map-container').length) {
    //     $('.item-info').hide(); // Hide the item-info modal
    //   }
    // });
    // Function to handle adding/removing classes maps__2_item
    $("#maps__2_item .tabs--item button").on("click", function () {
      $(".item-info").hide();
    });

    function updateItemInfoContent() {
      if ($("#hover_1_tab_1").hasClass("active")) {
        $(".item-info-content").addClass("show_title_1").removeClass("show_title_2");
      } else if ($("#hover_2_tab_2").hasClass("active")) {
        $(".item-info-content").addClass("show_title_2").removeClass("show_title_1");
      } else {
        $(".item-info-content").removeClass("show_title_1 show_title_2");
      }
    }

    // Function to display item-info modal
    function showItemInfo_1(item, factSheet_img_1, subtitle) {
      // Create the content for the item-info modal
      const content =
        `<div class="item-info-content" id="about_maps_1">
            <div class="flag--element">
                <img src="${factSheet_img_1}" alt="Fact Sheet Flag">
            </div>
            <div class="wrapper-element-africa">
                <span clss="test">${subtitle}</span>
                <div class="tabs---1">To get in touch with this international financial center, please enter your email address</div>
                <div class="tabs---2">To get in touch with this investment promotion agency, please enter your email address</div>
                <form class="d-flex mt-3">
                    <input type="email" class="form-control rounded-pill" placeholder="Email.." required="">
                    <button type="submit" class="form--news">Submit <i class="fas fa-arrow-right ms-2"></i></button>
                </form>
            </div>
        </div>`;

      // Find or create the .item-info modal
      let itemInfo = $('.item-info');
      if (itemInfo.length === 0) {
        itemInfo = $('<div class="item-info about_maps_1"></div>').appendTo('body');
      }

      itemInfo.html(content).show();

      // Get the position of the item relative to the document
      const pathOffset = item.offset();
      const windowWidth = $(window).width();
      const itemInfoWidth = itemInfo.outerWidth();
      const itemInfoHeight = itemInfo.outerHeight();

      // Position the modal above the item
      itemInfo.css({
        top: pathOffset.top - itemInfoHeight - 10, // Position above the item
        left: pathOffset.left,
        position: 'absolute',
      });

      // Check if the modal is off-screen on the left or right side and adjust position if necessary
      if (itemInfo.offset().left < 0) {
        itemInfo.css('left', 10); // Adjust to the left side of the viewport
      } else if ((itemInfo.offset().left + itemInfoWidth) > windowWidth) {
        itemInfo.css('left', windowWidth - itemInfoWidth - 10); // Adjust to the right side of the viewport
      }

      // Update item-info-content classes
      updateItemInfoContent();
    }

    // When the user hovers over the item with the class "item-wrap-1"
    $('.maps___1 .item-wrap-1, .maps___2 .item-wrap-1').on('mouseenter click', function () {
      const factSheet_img_1 = $(this).data('logo'); // Retrieve the fact sheet image link
      const subtitle = $(this).data('subtitle'); // Retrieve the subtitle
      showItemInfo_1($(this), factSheet_img_1, subtitle); // Show item-info modal
    });

    // When the mouse leaves the .map-container or .item-info, hide the modal
    $(document).on('mouseleave', '.map-container, .item-info', function (event) {
      // Check if the mouse has really left the map-container or item-info
      if (!$(event.relatedTarget).closest('.item-info').length && !$(event.relatedTarget).closest('.map-container').length) {
        $('.item-info').hide(); // Hide the item-info modal
      }
    });

    // Optional: Monitor clicks on hover tabs to dynamically update the state
    $(".element-sc").on("click", function () {
      // Add 'active' class to clicked element and remove from siblings
      $(".element-sc").removeClass("active");
      $(this).addClass("active");

      // Update item-info-content classes dynamically
      updateItemInfoContent();
    });
  });


  //
  const modal = $("#videoModal");
  const closeBtn = $(".close");
  const videoContainer = $("#videoContainer");

  // Handle click on video box
  $(".video-box,.success").on("click", function () {
    const iframeUrl = $(this).data("iframe");

    // Create iframe dynamically and append it to the modal content
    const iframe = $('<iframe></iframe>', {
      src: iframeUrl,
      width: '100%',
      height: '400',
      frameborder: '0',
      allowfullscreen: true
    });

    videoContainer.empty().append(iframe); // Clear and append the iframe

    // Show the modal with display flex
    modal.css('display', 'flex'); // Show modal using flexbox display
  });

  // Close modal on clicking close button
  closeBtn.on("click", function () {
    modal.css('display', 'none'); // Hide modal
    videoContainer.empty(); // Remove iframe from modal
  });

  // Close modal when clicking outside modal content
  $(window).on("click", function (e) {
    if ($(e.target).is(modal)) {
      modal.css('display', 'none'); // Hide modal
      videoContainer.empty(); // Remove iframe from modal
    }
  });
  //************ old */
  // $('.emblemes .element-sc').first().addClass('active');
  // $('.emblemes .tabs--item button').first().addClass('active'); // Add active class to the first tab
  // let initialBackgroundImage = $('.emblemes .element-sc.active').data('img');
  // $('.emblemes .informations_pratiques').css('background-image', 'url(' + initialBackgroundImage + ')');

  // // Function to handle tab activation based on ID
  // function activateTabById(id) {
  //   // Remove active class from all tabs and elements
  //   $('.emblemes .tabs--item button').removeClass('active');
  //   $('.emblemes .element-sc').removeClass('active');

  //   // Add active class to the corresponding tab and content element
  //   $('#' + id).addClass('active');
  //   $('.emblemes .element-sc').eq($('#' + id).index()).addClass('active');


  // }

  // // Handle clicks on tabs
  // $('.emblemes .tabs--item button').click(function () {
  //   var id = $(this).attr('id');
  //   activateTabById(id);
  // });
  // *********************************** end old
  // Function to handle tab activation based on ID
  function activateTabById(id) {
    // Remove active class from all tabs and elements
    $('.emblemes .tabs--item button').removeClass('active');
    $('.emblemes .element-sc').removeClass('active');

    // Add active class to the corresponding tab and content element
    $('#' + id).addClass('active');
    $('.emblemes .element-sc').eq($('#' + id).index()).addClass('active');
  }

  // Handle the URL fragment on page load
  var fragment = window.location.hash; // Get the fragment from the URL (e.g., #section2)

  if (fragment) {
    // If there's a fragment, activate the tab corresponding to the fragment (e.g., #section2)
    var sectionId = fragment.substring(1); // Remove the '#' character
    activateTabById(sectionId);
  } else {
    // If no fragment, activate the first tab and its content by default
    $('.emblemes .tabs--item button').first().addClass('active');
    $('.emblemes .element-sc').first().addClass('active');
  }

  // Handle clicks on tabs
  $('.emblemes .tabs--item button').click(function () {
    var id = $(this).attr('id');
    activateTabById(id);

    // Update the URL fragment when a tab is clicked
    window.location.hash = id; // Update the URL to reflect the active tab
  });
  //
  //   var $section = $('.scroll-sticky-tabs');
  //   var $header = $('header'); // Adjust this selector to match your header
  //   var sectionOffsetTop = $section.offset().top;
  //   var sectionOffsetBottom = sectionOffsetTop + $section.outerHeight();

  //   $(window).on('scroll', function () {
  //     var scrollPosition = $(window).scrollTop();

  //     // Add the class only when scrolling inside the section
  //     if (scrollPosition >= sectionOffsetTop && scrollPosition <= sectionOffsetBottom) {
  //       $header.addClass('active-header');
  //     } else {
  //       $header.removeClass('active-header');
  //     }
  //   });
  //   //
  //   function revealSteps() {
  //     $('.step').each(function () {
  //       var windowBottom = $(window).scrollTop() + $(window).height();
  //       var stepTop = $(this).offset().top;

  //       // If the step is visible in the viewport
  //       if (windowBottom > stepTop + 50) {
  //         $(this).addClass('show'); // Add the show class for animation
  //       }
  //     });
  //   }

  //   // Run the function on page load and scroll
  //   revealSteps();
  //   $(window).on('scroll', revealSteps);
  //   //
  //   function isInViewport(element) {
  //     var elementTop = $(element).offset().top;
  //     var elementBottom = elementTop + $(element).outerHeight();

  //     var viewportTop = $(window).scrollTop();
  //     var viewportBottom = viewportTop + $(window).height();

  //     // Check if the element is in the viewport
  //     return elementBottom > viewportTop && elementTop < viewportBottom;
  //   }

  //   // On scroll, check each .each-event
  //   $(window).on('scroll', function () {
  //     $('.each-event').each(function () {
  //       if (isInViewport(this)) {
  //         $(this).addClass('active'); // Make visible
  //       } else {
  //         $(this).removeClass('active'); // Dim if not in viewport
  //       }
  //     });
  //   });

  //   // Optional: Trigger scroll event on page load to check initial state
  //   $(window).trigger('scroll');
  //   //
  //   $(".element--detail .element-sc:last-child .img-1-maps").hover(
  //     function() {
  //         // On hover in
  //         $(".about_maps_1").addClass("remove____title");
  //     },
  //     function() {
  //         // On hover out
  //         $(".about_maps_1").removeClass("remove____title");
  //     }
  // );
  var $section = $('.scroll-sticky-tabs');
  if ($section.length > 0) {
    var $header = $('header'); // Adjust this selector to match your header
    var sectionOffsetTop = $section.offset().top;
    var sectionOffsetBottom = sectionOffsetTop + $section.outerHeight();

    $(window).on('scroll', function () {
      var scrollPosition = $(window).scrollTop();

      // Add the class only when scrolling inside the section
      if (scrollPosition >= sectionOffsetTop && scrollPosition <= sectionOffsetBottom) {
        $header.addClass('active-header');
      } else {
        $header.removeClass('active-header');
      }
    });
  }

  function revealSteps() {
    $('.step').each(function () {
      var windowBottom = $(window).scrollTop() + $(window).height();
      var $this = $(this);
      if ($this.length > 0) {
        var stepTop = $this.offset().top;

        // If the step is visible in the viewport
        if (windowBottom > stepTop + 50) {
          $this.addClass('show'); // Add the show class for animation
        }
      }
    });
  }

  // Run the function on page load and scroll
  revealSteps();
  $(window).on('scroll', revealSteps);

  function isInViewport(element) {
    var $el = $(element);
    if ($el.length > 0) {
      var elementTop = $el.offset().top;
      var elementBottom = elementTop + $el.outerHeight();

      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > viewportTop && elementTop < viewportBottom;
    }
    return false;
  }

  // On scroll, check each .each-event
  $(window).on('scroll', function () {
    $('.each-event').each(function () {
      if (isInViewport(this)) {
        $(this).addClass('active'); // Make visible
      } else {
        $(this).removeClass('active'); // Dim if not in viewport
      }
    });
  });

  // Optional: Trigger scroll event on page load to check initial state
  $(window).trigger('scroll');

  // $(".element--detail .element-sc:last-child .img-1-maps").hover(
  //   function () {
  //     // On hover in
  //     $(".about_maps_1").addClass("remove____title");
  //   },
  //   function () {
  //     // On hover out
  //     $(".about_maps_1").removeClass("remove____title");
  //   }
  // );


  // $("#hover_1_tab_1.active , #hover_2_tab_2.active").hover(
  //   function () {
  //     // On hover in
  //     $(".about_maps_1").addClass("remove____title");
  //   },
  //   // function () {
  //   //   // On hover out
  //   //   // Check if the mouse is not hovering over the modal
  //   //   if (!$(".about_maps_1:hover").length) {
  //   //     $(".about_maps_1").removeClass("remove____title");
  //   //   }
  //   // }
  // );

  // $(".about_maps_1").hover(
  //   function () {
  //     // On hover in over the modal, do nothing (don't remove class)
  //   },
  //   // function () {
  //   //   // On hover out of the modal, remove the class if not hovering over the target
  //   //   if (!$(".element--detail #hover_2_tab_2:hover").length) {
  //   //     $(".about_maps_1").removeClass("remove____title");
  //   //   }
  //   // }
  // );
  //
  $(document).ready(function () {
    // Function to get query parameters from URL
    function getQueryParam(param) {
      var urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(param);
    }

    // Get the 'keys' query parameter value
    var searchTerm = getQueryParam('keys');

    // Set the value of the span with id="search-term" if searchTerm exists
    if (searchTerm) {
      $('#search-term').text(searchTerm);
    }

    // Optionally, if you want to set the input field value to the searchTerm from URL
    // $('#edit-keys--2').val(searchTerm);
  });
  //
  // $(document).ready(function () {
  //   // Function to handle adding/removing classes


  //   // Run once on page load
  //   updateItemInfoContent();

  //   // Monitor clicks to update dynamically
  //   $(".element-sc").on("click", function () {
  //     // Add 'active' class to clicked element and remove from siblings
  //     $(".element-sc").removeClass("active");
  //     $(this).addClass("active");

  //     // Update classes accordingly
  //     updateItemInfoContent();
  //   });
  // });
  // Modal click logic for ".click--modal-hp"
  $(".rapport_size_img div#list--news-all > div:first-child .click--modal-hp").on("click", function (event) {
    event.preventDefault(); // Prevent default action
    const factSheetLink = $(this).data("pdf");

    // Update the download link dynamically
    $("#download-link").attr("href", factSheetLink);

    // Update the input field value dynamically
    $("#edit-pdf").val(factSheetLink);

    // Show the member modal
    $("#member-modal").fadeIn();

    // Close modal functionality
    $(".showing_modal_pop_up .close").off("click").on("click", function () {
      $(".showing_modal_pop_up").fadeOut();
      $("#access-password").val("");
      $("#error-message").hide();
    });

    // Handle non-member button click
    $("#not-member-btn").off("click").on("click", function () {
      $("#member-modal").hide();
      $("#non-member-modal").fadeIn();
    });

    // Switch to member modal
    $("#already-member-btn").off("click").on("click", function () {
      $("#non-member-modal").hide();
      $("#member-modal").fadeIn();
    });

    // Remove disabled so the button is clickable
    $("#download-btn").prop("disabled", false);

    // Handle password validation
    const correctPassword = "CFC123";
    $("#access-password").off("input").on("input", function () {
      const enteredPassword = $(this).val();
      if (enteredPassword === correctPassword) {
        $("#error-message").hide();
      }
    });

    // Handle download button click
    $("#download-btn").off("click").on("click", function (event) {
      const enteredPassword = $("#access-password").val();
      if (enteredPassword !== correctPassword) {
        event.preventDefault();
        $("#error-message").text("Wrong password, please try again").show();
      } else {
        $("#error-message").hide();
      }
    });
  });
  //
  // Initialize Owl Carousel
  $('.Testimonials_slide .owl-carousel').owlCarousel({
    center: true,
    loop: true,
    margin: 0,
    nav: true,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1,
        stagePadding: 0,
      },
      1200: {
        items: 1,
        stagePadding: 200,
      },
      1500: {
        items: 1,
        stagePadding: 300,
      },
      1750: {
        items: 1,
        stagePadding: 450,
      }
    }
  });


  // // Modal Functionality
  // const modal_sc = $('.all_modale_albume');
  // const modalVideo = modal_sc.find('video');

  // $('.all___class_box_albume').click(function () {
  //   const videoSrc = $(this).data('video');
  //   modalVideo.attr('src', videoSrc);
  //   modal_sc.addClass('active');
  // });

  // $('.close-btn').click(function () {
  //   modal_sc.removeClass('active');
  //   modalVideo[0].pause();
  //   modalVideo.attr('src', '');
  // });

  // modal_sc.click(function (e) {
  //   if ($(e.target).is(modal_sc)) {
  //     modal_sc.removeClass('active');
  //     modalVideo[0].pause();
  //     modalVideo.attr('src', '');
  //   }
  // });
  // Modal Functionality
  const modal_1 = $('.all_modale_albume');
  const modalVideo = modal_1.find('video');

  $('.all___class_box_albume').click(function () {
    const videoSrc = $(this).data('video');
    modalVideo.attr('src', videoSrc);
    modal_1.addClass('active');

    // Automatically play the video
    modalVideo[0].play();
  });

  $('.close-btn').click(function () {
    modal_1.removeClass('active');
    modalVideo[0].pause();
    modalVideo.attr('src', '');
  });

  modal_1.click(function (e) {
    if ($(e.target).is(modal_1)) {
      modal_1.removeClass('active');
      modalVideo[0].pause();
      modalVideo.attr('src', '');
    }
  });
  //
  $('.investment-box').each(function () {
    const href = $(this).attr('href'); // Get the href attribute
    if (href) {
      $(this).css('cursor', 'pointer'); // Add pointer cursor
      $(this).on('click', function () {
        window.location.href = href; // Navigate to the URL
      });
    }
  });
  //
  AOS.init({
    duration: 1000, // Animation duration
    once: false, // Ensure animations trigger each time they enter viewport
  });

  // $(window).on('load', function () {
  //   var $loader = $('#loader');

  //   // Show the loader when the page is loading
  //   $loader.fadeIn();

  //   // Hide the loader after 3 seconds
  //   setTimeout(function () {
  //     $loader.fadeOut();
  //     AOS.refresh(); // Ensure AOS recalculates positions after loader disappears
  //   }, 3000); // 3 seconds delay
  // });

  // Function to show preloader and hide page content until the preloader disappears
  // ****************
  // function showPreloader() {
  //   var $loader = $('#loader');
  //   var $body = $('body');
  //   $loader.fadeIn(); // Show the loader

  //   // Disable page content display until the loader disappears
  //   $body.css('overflow', 'hidden'); // Prevent scrolling

  //   setTimeout(function () {
  //     $loader.fadeOut(); // Hide loader after 3 seconds
  //     $body.css('overflow', ''); // Enable page scrolling after loader disappears
  //     AOS.refresh(); // Ensure AOS recalculates positions after loader disappears
  //   }, 3000); // 3 seconds delay
  // }

  // // Show the preloader when the page is loaded
  // $(window).on('load', function () {
  //   showPreloader();
  // });

  // // Show the preloader when clicking on a link (excluding external links)
  // $('a').not('[target="_blank"]').on('click', function (e) {
  //   var link = $(this).attr('href');
  //   if (link && link.indexOf(window.location.origin) !== -1) {
  //     e.preventDefault(); // Prevent default link action
  //     showPreloader();

  //     // Delay navigation slightly after the preloader disappears
  //     setTimeout(function () {
  //       window.location.href = link;
  //     }, 500); // 500ms delay before navigating
  //   }
  // });
  // aos animation
  setTimeout(() => {
    // Remove loader
    $('#loader').fadeOut(600, function () {
      $(this).remove();
      $('#loader-style').remove();
    });
  }, 600);
  //
  $(".slider_page_banner_sc .owl-carousel").owlCarousel({
    items: 1, // Show 3 images at a time
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000, // Slide every 3s
    autoplayHoverPause: true,
    smartSpeed: 600, // Smooth transition
    center: true,
    dots: true,
    nav: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  // SHOW / HIDE password
  $("form").on('click', '.toggle-password', function () {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  if ($('.password_login_page').length) {
    $('body').addClass('remove_banner_pass');
  }

  //

  $('#user-login-form').submit(function (e) {
    if (grecaptcha.getResponse() === '') {
      e.preventDefault();
      $('.captcha_log').append('<p class="error">Le CAPTCHA est requis.</p>');
    }
  });
  $('.card time,.article-date time').each(function() {
    // Get the datetime attribute value
    const datetime = $(this).attr('datetime');

    // Parse the datetime value into a Date object
    const date = new Date(datetime);

    // Format the date as "Month, Year"
    const formattedDate = date.toLocaleString('default', { month: 'long', year: 'numeric' });

    // Update the text content of the <time> element
    $(this).text(formattedDate);
  });
  // $('#webform-submission-contact-add-form').submit(function (e) {
  //   // Check if the g-recaptcha-response field is empty
  //   if ($('#g-recaptcha-response-1').val() === '') {
  //     e.preventDefault(); // Prevent form submission

  //     // Remove any previous error message to avoid duplicates
  //     $('.captcha .error').remove();

  //     // Append the error message below the CAPTCHA field
  //     $('.captcha').append('<p class="error">Le CAPTCHA est requis.</p>');
  //   }
  // });

  // // Optional: If the user interacts with the CAPTCHA, remove the error message
  // grecaptcha.render('g-recaptcha', {
  //   'callback': function (response) {
  //     $('.captcha .error').remove(); // Remove error message when CAPTCHA is validated
  //   }
  // });
  // $('#webform-submission-contact-add-form').submit(function (e) {
  //   // Check if reCAPTCHA is filled
  //   if (grecaptcha.getResponse() === '') {
  //     e.preventDefault();
  //     $('.captcha .error').remove(); // Remove existing error messages
  //     $('.captcha').append('<p class="error">Le CAPTCHA est requis.</p>');
  //   } else {
  //     $('.captcha .error').remove(); // If checked, remove error message
  //   }
  // });
})(jQuery);
